<?php
/**
 * Created by PhpStorm.
 * User: sunshine
 * Date: 11/01/18
 * Time: 18:07
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
class ExceptionController extends Controller
{
public function showExceptionAction(Request $request)
{
    return $this->render('::error404.html.twig');
}
}