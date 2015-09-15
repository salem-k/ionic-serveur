<?php

namespace AppBundle\Controller;

use AppBundle\Model\IonicCategory;
use AppBundle\Model\IonicContent;
use FOS\RestBundle\Controller\Annotations\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestController extends Controller
{
    /**
     * @ApiDoc(
     *  resource=true,
     *  description="Return the list of categories, displayed in the left menu in ionic",
     * )
     *
     * @View(serializerGroups={"list"})
     */
    public function getCategoriesAction()
    {
        return $this->getRepository('AppBundle:Category')->findAll();
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="",
     * )
     *
     * @View(serializerGroups={"details","articleList"})
     */
    public function getCategoriesArticlesAction($categoryId)
    {
        return $this->getRepository('AppBundle:Category')->find($categoryId);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  description="",
     * )
     *
     * @View(serializerGroups={"details"})
     */
    public function getArticleAction($articleId)
    {
        return $this->getRepository('AppBundle:Article')->find($articleId);
    }

    protected function getEntityManager()
    {
        return $this->get('doctrine.orm.default_entity_manager');
    }

    protected function getRepository($class)
    {
        return $this->getEntityManager()->getRepository($class);
    }
}
