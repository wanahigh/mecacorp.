<?php
namespace Acme\ActorBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Acme\ActorBundle\Entity\Actors;

class AjaxAutocompleteController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateDataAction(Request $request)
    {
        $data = $request->get('input');

        $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery(''
            . 'SELECT c.id, c.raisonsocial '
            . 'FROM AcmeActorBundle:Actors c '
            . 'WHERE c.raisonsocial LIKE :data '
            . 'ORDER BY c.id ASC'
        )
            ->setParameter('data', '%' . $data . '%');
        $results = $query->getResult();

        $ActorList = '<blockquote><ul class="card z-depth-10" id="matchList">';
        foreach ($results as $result) {
            $matchStringBold = preg_replace('/(' . $data . ')/i', '<strong>$1</strong>', $result['raisonsocial']);
            $ActorList .= '<h4><a href="#" class="btn blue"><li  id="' . $result['raisonsocial'] . '">' . $matchStringBold . '</li>';
        }
        $ActorList .= '</ul></a></h4></blockquote>';

        $response = new JsonResponse();
        $response->setData(array('ActorList' => $ActorList));
        return $response;
    }
}

