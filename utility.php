<?php
use Abiodun\Model\Vote;
use Abiodun\Model\Answer;

function withVotes($id)
{
    $staff = new Vote;
    $query = $staff->connector->query("SELECT * FROM votes WHERE user_id = '{$id}'");
    return $query;
}

function allVotes()
{
    $staff = new Vote;
    $query = $staff->connector->query("SELECT * FROM votes ");
    return $query;
}

function showVote($type)
{
    $staff = new Vote;
    $query = $staff->connector->query("SELECT COUNT(*) FROM votes WHERE election_type='{$type}'");
    return $query;
}
