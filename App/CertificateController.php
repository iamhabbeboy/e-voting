<?php
namespace Abiodun\App;

use Abiodun\App\Helper;
use Abiodun\Model\Certificate;

class CertificateController
{
    use Helper;

    public function create()
    {
        $requests = Helper::request();
        $dateTo = $requests->date_to;
        $dateFrom = $requests->date_from;
        $requests->date = $dateFrom . '=' . $dateFrom;
        unset($requests->date_from);
        unset($requests->date_to);

        $userId = $_SESSION['staff']['id'];
        $requests->staff_id = $userId;
       
        $certificate = new Certificate;
        $userExist = $certificate->where('staff_id', $userId);
        $itExist = $userExist->rowCount() > 0 ? $certificate->where('title', $requests->title)->rowCount() : 0 ;

        if ($itExist > 0) {
            header('location: index.php?rel=home&method=certificate&error=1');
        } 
        $response = $certificate->create($requests);
        header('location: index.php?rel=home&method=certificate');
    }
}