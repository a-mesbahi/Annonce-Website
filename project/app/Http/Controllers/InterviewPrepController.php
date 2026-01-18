<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewPrepController extends Controller
{
    public function index()
    {
        $questions = [
            [
                'question' => 'Tell me about yourself',
                'answer' => 'Focus on your professional journey. Start with your current role, highlight 2-3 key achievements, and explain why you\'re excited about this opportunity. Keep it under 2 minutes.'
            ],
            [
                'question' => 'Why do you want to work here?',
                'answer' => 'Research the company beforehand. Mention specific projects, values, or technologies they use. Connect your skills and career goals to what the company offers.'
            ],
            [
                'question' => 'What are your strengths?',
                'answer' => 'Pick 2-3 relevant strengths with concrete examples. Use the STAR method: Situation, Task, Action, Result. Make sure they align with the job requirements.'
            ],
            [
                'question' => 'What is your biggest weakness?',
                'answer' => 'Choose a real weakness but show how you\'re working to improve it. Example: "I used to struggle with public speaking, so I joined Toastmasters and now regularly present at team meetings."'
            ],
            [
                'question' => 'Where do you see yourself in 5 years?',
                'answer' => 'Show ambition but be realistic. Focus on skill development and growing within the company. Avoid saying you want their boss\'s job or starting your own company.'
            ],
            [
                'question' => 'Why should we hire you?',
                'answer' => 'Summarize your unique value: relevant experience, skills that match the job, and enthusiasm for the role. Use specific examples of past achievements that relate to this position.'
            ],
            [
                'question' => 'Describe a challenging situation and how you handled it',
                'answer' => 'Use STAR method: Describe the Situation, your Task, the Action you took, and the Result. Focus on problem-solving skills and positive outcomes.'
            ],
            [
                'question' => 'Do you have any questions for us?',
                'answer' => 'Always have 2-3 questions ready. Ask about team culture, growth opportunities, day-to-day responsibilities, or upcoming projects. Never ask about salary in the first interview.'
            ],
        ];

        return view('interview-prep', compact('questions'));
    }
}

