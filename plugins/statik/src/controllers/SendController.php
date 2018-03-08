<?php
/**
 * Statik plugin for Craft CMS 3.x
 *
 * statik plugin
 *
 * @link      http://www.statik.be
 * @copyright Copyright (c) 2018 statik
 */

namespace statik\statik\controllers;

use CS_REST_Subscribers;
use statik\statik\Statik;

use Craft;
use craft\web\Controller;

/**
 * Default Controller
 *
 * Generally speaking, controllers are the middlemen between the front end of
 * the CP/website and your plugin’s services. They contain action methods which
 * handle individual tasks.
 *
 * A common pattern used throughout Craft involves a controller action gathering
 * post data, saving it on a model, passing the model off to a service, and then
 * responding to the request appropriately depending on the service method’s response.
 *
 * Action methods begin with the prefix “action”, followed by a description of what
 * the method does (for example, actionSaveIngredient()).
 *
 * https://craftcms.com/docs/plugins/controllers
 *
 * @author    statik
 * @package   Statik
 * @since     1.0.0
 */
class SendController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['send', 'do-something'];

    // Public Methods
    // =========================================================================

    public function actionSend()
    {

        $email = Craft::$app->request->post('mail');

        $auth = array(
            'api_key' => '380765aa808adb4708ffca2c5556e39481d9328030518df5'
        );

        $wrap = new CS_REST_Subscribers('f598598fadedff573a3abc06c2525dcb', $auth);
        $result = $wrap->add(array(
            'EmailAddress' => $email,
            'Resubscribe' => true
        ));

        if($result->was_successful()) {
            return $this->redirectToPostedUrl();
        } else {
            echo 'Failed with code '.$result->http_status_code."\n<br /><pre>";
            var_dump($result->response);
            echo '</pre>'; exit;
        }


    }

    /**
     * Handle a request going to our plugin's index action URL,
     * e.g.: actions/statik/default
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * Handle a request going to our plugin's actionDoSomething URL,
     * e.g.: actions/statik/default/do-something
     *
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the DefaultController actionDoSomething() method';

        return $result;
    }
}
