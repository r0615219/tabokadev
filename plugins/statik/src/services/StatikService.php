<?php
/**
 * Statik plugin for Craft CMS 3.x
 *
 * statik plugin
 *
 * @link      http://www.statik.be
 * @copyright Copyright (c) 2018 statik
 */

namespace statik\statik\services;

use statik\statik\Statik;

use Craft;
use craft\base\Component;

/**
 * StatikService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    statik
 * @package   Statik
 * @since     1.0.0
 */
class StatikService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     Statik::$plugin->statikService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';

        return $result;
    }
}
