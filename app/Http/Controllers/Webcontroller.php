<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Category;
use App\Models\Player;
use App\Models\Agerange;
use App\Models\Question;
use App\Models\Result;
use App\Models\Answer;
use App\Models\Playeranswer;

class Webcontroller extends Controller
{
    public function home()
    {
        return view('web.home');
    }
    public function about()
    {
        return view('web.about');
    }
    public function category()
    {
        $categories = Category::where('status', 1)->get();
        return view('web.category', compact('categories'));
    }
    public function agegroup(Request $request, $categoryId)
    {
        $category = Category::where('id', $categoryId)->first();
        $agegroups = Agerange::where('status', 1)->get();
        return view('web.agegroup', compact('agegroups', 'category'));
    }
    public function howtoplay()
    {
        return view('web.howtoplay');
    }
    public function subject()
    {
        return view('web.subject');
    }
    public function questionanswer(Request $request, $categoryId, $agerangeId)
    {
        $category = Category::where('id', $categoryId)->first();
        $agerange = Agerange::where('id', $agerangeId)->first();
        $questionanswers = Question::where('categoryId', $categoryId)->where('ageRangeId', $agerangeId)->with('answers')->get();

        return view('web.questionanswer', compact('questionanswers','category','agerange'));
    }
    public function result($resultId)
    {
        $playerId = Auth::guard('player')->id();
        $results = Result::where('id', $resultId)->with('playeranswer', 'playeranswer.question', 'playeranswer.selectedAnswer', 'playeranswer.correctAnswer')->where('playerId', $playerId)->first();
        $playerAnswers = Playeranswer::with('result', 'question', 'selectedAnswer', 'correctAnswer')->where('resultId', $resultId)->get();
        // return $results;
        return view('web.result', compact('results', 'playerAnswers'));
    }
    public function registerGet()
    {
        return view('web.register');
    }
    public function loginGet()
    {
        return view('web.login');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:players,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $player = Player::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('player')->login($player);

        return redirect('/category')->with('success', 'Registration successful!');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('player')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/category')->with('success', 'Welcome back!');
        }

        logger($request);
        logger("bhak");
        return back()->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout(Request $request)
    {
        Auth::guard('player')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'You have been logged out.');
    }
    public function myResults()
    {
        $attempts = Result::where('playerId', Auth::guard('player')->id())->with('player', 'category', 'ageRange')->get();
        return view('web.myresult', compact('attempts'));
    }

    public function submitQuiz(Request $request, $categoryId, $agerangeId)
    {
        $playerId = Auth::guard('player')->id();
        $answers = $request->input('answers', []); // [questionId => selectedAnswerId]

        $totalQuestions = count($answers);
        $correctAnswers = 0;

        // STEP 1: Count correct answers
        foreach ($answers as $questionId => $selectedAnswerId) {
            $isCorrect = Answer::where('id', $selectedAnswerId)
                ->where('isCorrect', 1)
                ->exists();

            if ($isCorrect) {
                $correctAnswers++;
            }
        }

        // STEP 2: Calculate score
        $score = ($totalQuestions > 0)
            ? round(($correctAnswers / $totalQuestions) * 100, 2)
            : 0;

        // STEP 3: Create result record
        $result = new Result();
        $result->playerId = $playerId;
        $result->categoryId = $categoryId;
        $result->ageRangeId = $agerangeId;
        $result->totalQuestions = $totalQuestions;
        $result->correctAnswers = $correctAnswers;
        $result->score = $score;

        // Attempt number logic
        $lastAttempt = Result::where('playerId', $playerId)->max('attemptNumber');
        $result->attemptNumber = $lastAttempt ? $lastAttempt + 1 : 1;

        $result->save();

        // STEP 4: Store player answers
        foreach ($answers as $questionId => $selectedAnswerId) {
            // Find the correct answer for this question
            $correctAnswer = Answer::where('questionId', $questionId)
                ->where('isCorrect', 1)
                ->first();

            $isCorrect = $correctAnswer && $correctAnswer->id == $selectedAnswerId ? 1 : 0;

            $playerAnswer = new Playeranswer();
            $playerAnswer->playerId = $playerId;
            $playerAnswer->resultId = $result->id;
            $playerAnswer->ageRangeId = $result->ageRangeId;
            $playerAnswer->categoryId = $result->categoryId;
            $playerAnswer->questionId = $questionId;
            $playerAnswer->selectedAnswerId = $selectedAnswerId;
            $playerAnswer->correctAnswerId = $correctAnswer ? $correctAnswer->id : null;
            $playerAnswer->isCorrect = $isCorrect;
            $playerAnswer->save();
            logger($playerAnswer);
        }
        logger($result);

        // STEP 5: Redirect to result page
        return redirect()->to('/result/' . $result->id)
            ->with('success', 'Quiz submitted successfully!');
    }
}
