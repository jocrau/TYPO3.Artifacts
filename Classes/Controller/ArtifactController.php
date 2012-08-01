<?php
namespace TYPO3\Artifacts\Controller;

/*                                                                        *
 * This script belongs to the FLOW3 package "TYPO3.Artifacts".            *
 *                                                                        *
 *                                                                        */

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Standard controller for the TYPO3.Artifacts package
 *
 * @FLOW3\Scope("singleton")
 */
class ArtifactController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {

	/**
	 * @FLOW3\Inject
	 * @var \TYPO3\Semantic\Domain\Repository\Sparql\QueryRepository
	 */
	protected $queryRepository;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$query = $this->queryRepository->findAll()->getFirst();
		if ($query != NULL) {
			$this->view->assign('results', $query->execute());
			$content = $this->view->render(); // The query gets executed lazily during render time. Thus, we include the render() method.
			return $content;
		}
		return "";
	}

}

?>