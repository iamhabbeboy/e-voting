<?php
namespace Abiodun\App;

use Abiodun\App\Helper;
use Abiodun\Model\User;
use Abiodun\Model\Election;
use Abiodun\Model\Promotion;
use Abiodun\Model\ElectionType;

class AdminController
{
    use Helper;

    public function index()
    {
        return Helper::view('admin');
    }

    public function dashboard()
    {
        return Helper::view('dashboard-admin');
    }

    public function elect()
    {
        $elect = new ElectionType;
        $query = $elect->all()->fetchAll();
        return Helper::view('election', ['elections' => $query]);
    }

    public function type()
    {
        $requests = Helper::request();
        $electionType = new ElectionType;
        $query = $electionType->where('title', $requests->title);
        if ($query->rowCount() < 1) {
            $electionType->create($requests);
            header('location: index.php?rel=admin&method=elect&status=1');
        } else {
            header('location: index.php?rel=admin&method=elect&error=2');
        }
    }

    public function election()
    {
        $party = new Election;   
        $election = new ElectionType;
        
        $query = $election->all();
        $fetch = $query->fetchAll();
        $party = $party->all()->fetchAll();

        return Helper::view('add-party', ['type' => $fetch, 'party' => $party]);
    }

    public function party()
    {
        $election = new Election;
        $requests = Helper::request();

        $query = $election->where('party', $requests->party);
        $row = $query->rowCount() > 0 ? 
        $election->where('election_type', $requests->election_type)->rowCount() 
        : 0;
        // var_dump($row);
        // die;
        if ($row > 0) {
            header('location: index.php?rel=admin&method=election&error=1');
        } else {
  
            $response = $election->create($requests);
            header('location: index.php?rel=admin&method=election&status=1');
        }
    }

    public function users()
    {
        $staff = new User;
        $query = $staff->all()->fetchAll();
        return Helper::view('staff', ['staffs' => $query]);
    }

    // public function promote()
    // {
    //     $promote = $_GET['id'];
    //     $promotion = new Promotion;
    //     $data = (object) ['user_id' => $promote, 'title' => 'promotion', 'description' => 'you have been promoted', 'rel' => '', 'method' => ''];
    //     $promotion->create($data);
    //     header('location: index.php?rel=admin&method=staff&status=1');
    // }
}
