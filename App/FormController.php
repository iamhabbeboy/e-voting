<?php
namespace Abiodun\App;

use Abiodun\App\Helper;
use Abiodun\Model\User;
use Abiodun\Model\Answer;

class FormController
{
    use Helper;

    protected $staff;

    public function create()
    {
        $user = new User;
        $request = Helper::request();
        $request->votersID = substr(mt_rand(99999, 100000000), 0, 8);
        // var_dump($request);
        // die;
        $query = $user->where('email', $request->email);

        if ($query->rowCount() > 0) {
            header('location: index.php?error=1');
        }

        $response = $user->create($request);
        $_SESSION['staff'] = $response;
        header('location: index.php?rel=home&method=dashboard');
    }

    public function exam()
    {
        $requests = Helper::request();
        $staff_id = $_SESSION['staff']['id'];
        $questionIds = $requests->question_id;
        foreach ($questionIds as $question) {
            $questions = $_POST['option_'.$question];
            $split = explode('_', $questions);
            $option = $split[0];
            $answer = $split[1];
            $questionid = $split[2];
            $query = [
                'rel' => '...',
                'method' => '..',
                'staff_id' => (int) $staff_id,
                'question_id' => (int) $questionid,
                'opt' => $option,
                'answer' => $answer,
            ];
            $convert = (object) $query;
            $answer1 = new Answer;
            $isAvailable = $answer1->where('staff_id', $staff_id);
            $checkRow = ($isAvailable->rowCount() > 0) ? $answer1->where('question_id', $questionid) : 0;
            if ($checkRow > 1) {
                header('location: index.php?rel=home&method=exam&error=3');
            }
            $save = $answer1->create($convert);
            header('location: index.php?rel=home&method=exam&status=1');
        }
    }
}
