<?php

class AgentController extends FrontController
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionEdit()
	{
		if (!$this->user->isGuest && array() != $this->user->rules) {
			$model = null;

			if (true === $this->user->rules['profile']) {
				$model = $this->user->model;

				if (isset($_POST['Agent'])) {
					$model->attributes = $_POST['Agent'];

					if ($model->validate()) {
						if (!empty($_FILES['Agent'])) {
//							$oImg = new FieldImages;
//							$result = $oImg->upload('Agent', array(
//								'count'   => 1,
//								'dirname' => 'files/agents',
//								'w'       => 210,
//								'h'       => 160,
//							));
//
//							$model->photo = $oImg->addFile($this->user->data->photo, $result['filename']);
						}

						$model->save();
					}
				}
			}

			$this->render('edit', array(
				'model' => $model,
			));
		} else {
			$this->render('//site/error', array(
				'code'    => 403,
				'message' => 'Access denied',
			));
		}
	}

}