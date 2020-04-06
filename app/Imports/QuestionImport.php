<?php
namespace App\Imports;

use App\Models\Question;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToCollection;

class QuestionImport implements ToCollection
{
    private $test_id;
    private $lang;

    public function __construct($data)
    {
        $this->test_id = $data['test_id'];
        $this->lang = $data['lang'];
    }

    public function collection(Collection $rows)
    {
        Question::where('q_test_id', $this->test_id)->where('q_lang', $this->lang)->update(['q_is_active' => 0]);
        foreach ($rows as $key => $row) {
            if (!is_null($row[0])) {
                if (Str::startsWith($row[0], '?')) {
                    $question_str = substr($row[0], 1);
                    // $question_by_lang = explode("/", $question_str);
                    $question = Question::create([
                        'q_test_id' => $this->test_id,
                        'q_name' => $question_str,
                        'q_lang' => $this->lang
                        // 'q_name_ru' => array_key_exists(0,$question_by_lang) ? $question_by_lang[0] : null,
                        // 'q_name_kz' => array_key_exists(1,$question_by_lang) ? $question_by_lang[1] : null,
                        // 'q_name_en' => array_key_exists(2,$question_by_lang) ? $question_by_lang[2] : null
                    ]);
                } elseif (Str::startsWith($row[0], '*')) {
                    $answer = substr($row[0], 1);
                    // $answer_by_lang = explode("/", $answer);
                    $question->answers()->create([
                        // 'a_name_ru' => array_key_exists(0,$answer_by_lang) ? $answer_by_lang[0] : null,
                        // 'a_name_kz' => array_key_exists(1,$answer_by_lang) ? $answer_by_lang[1] : null,
                        // 'a_name_en' => array_key_exists(2,$answer_by_lang) ? $answer_by_lang[2] : null,
                        'a_name' => $answer,
                        'a_is_correct' => 1,
                    ]);
                } else {
                    // $answer_by_lang = explode("/", $row[0]);
                    $question->answers()->create([
                        'a_name' => $row[0],
                        // 'a_name_ru' => array_key_exists(0,$answer_by_lang) ? $answer_by_lang[0] : null,
                        // 'a_name_kz' => array_key_exists(1,$answer_by_lang) ? $answer_by_lang[1] : null,
                        // 'a_name_en' => array_key_exists(2,$answer_by_lang) ? $answer_by_lang[2] : null
                    ]);
                }
            }
        }
    }
}
