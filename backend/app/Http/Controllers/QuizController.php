<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveQuestionRequest;
use App\Models\AnswerSet;
use App\Models\Question;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function create() {
        $this->authorize('approve');

        return view('quiz/create');
    }

    public function read() {
        $questions = Question::all();

        return view('quiz/read', compact('questions'));
    }

    public function results(Request $request) {
        $correct = 0;
        $correct_answers = Question::all()->pluck('answerSet')->pluck('correct');
        $total = sizeof($correct_answers);
        $input = $request->input();

        for ($index = 1; $index <= $total; $index++) {
            if ($input[$index] == $correct_answers[$index - 1]) {
                $correct++;
            }
        }

        return view('quiz/results', compact('correct', 'total'));
    }

    public function save(SaveQuestionRequest $request) {
        $question = new Question($request->all());
        $question->title = $request->question;
        $question->save();

        $answerSet = new AnswerSet();
        $answerSet->question_id = $question->id;
        $answerSet->first = $request->first;
        $answerSet->second = $request->second;
        $answerSet->third = $request->third;
        $answerSet->fourth = $request->fourth;
        $answerSet->correct = $request->correct;
        $answerSet->save();

        return redirect()->route('quiz.create');
    }
}
