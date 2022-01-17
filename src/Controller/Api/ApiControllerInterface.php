<?php


namespace App\Controller\Api;


interface ApiControllerInterface
{
    public function indexAction();

    public function getAction($id);

    public function postAction();

    public function putAction($id);

    public function patchAction($id);

    public function deleteAction($id);
}