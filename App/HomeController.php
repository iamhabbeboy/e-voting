<?php
namespace Abiodun\App;

use Abiodun\App\Helper;
use Abiodun\Model\User;
use Abiodun\Model\Answer;
use Abiodun\Model\Question;
use Abiodun\Model\Election;
use Abiodun\Model\Vote;
use Abiodun\Model\ElectionType;

class HomeController
{
    use Helper;

    public function __construct()
    {
    }

    public function index()
    {
        return Helper::view('index');
    }

    public function dashboard()
    {

        return Helper::view('dashboard');
    }

    public function profile()
    {
        return Helper::view('profile');
    }

    public function logout()
    {
        if (isset($_SESSION['staff'])) {
            unset($_SESSION['staff']);
        }
        header('location: index.php');
    }

    public function login()
    {
        $staff = new User;
        $requests = Helper::request();
        $query = $staff->where('email', $requests->email);
        $password = ($query->rowCount() > 0) ? $staff->where('password', $requests->password)->rowCount() : 0;

        if ($password > 0) {
            $fetch = $query->fetch();
            $_SESSION['staff'] = $fetch;
            header('location: index.php?rel=home&method=dashboard');
        } else {
            header('location: index.php?error=2');
        }
    }

    public function exam()
    {
        $answer = new Answer;
        $questions = new Question;
        $user_id = $_SESSION['staff']['id'];
        $query = $questions->all()->fetchAll();
        $answerQuery = $answer->where('staff_id', $user_id)->fetchAll();
        return Helper::view('exam', ['questions' => $query, 'answers' => $answerQuery]);
    }
    
    public function vote()
    {
        $election = new Election;
        $type = new ElectionType;
        $party = $election->all()->fetchAll();
        $electionType = $type->all()->fetchAll();

        return Helper::view('vote', ['party' => $party, 'type' => $electionType]);
    }

    public function ajax()
    {
        $requests = Helper::request();
        $type = $requests->type;
        $election = new Election;
        $sql = $election->where('election_type', $type)->fetchAll();
        echo json_encode($sql);
    }

    public function castVote()
    {
        $vote = new Vote;
        $requests = Helper::request();
        $party = $requests->party;
        $type = $requests->election_type;
        $user_id = $_SESSION['staff']['id'];
        $requests->user_id = $user_id;

        $query = $vote->where('user_id', $user_id);
        $row = ($query->rowCount() > 0) ? $vote->where('election_type', $type)->rowCount() : 0;

        if ($row > 0 ) {
            echo json_encode(['status' => 'exist']);
        } else {
            $response = $vote->create($requests);
            echo json_encode($response);
        }
    }
}
