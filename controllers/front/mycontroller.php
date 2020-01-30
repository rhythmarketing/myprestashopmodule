<?php
/*
    * Directory: froncontrollers/
    * 2007-2013 PrestaShop
    *
    * NOTICE OF LICENSE
    *
    * This source file is subject to the Open Software License (OSL 3.0)
    * that is bundled with this package in the file LICENSE.txt.
    * It is also available through the world-wide-web at this URL:
    * http://opensource.org/licenses/osl-3.0.php
    * If you did not receive a copy of the license and are unable to
    * obtain it through the world-wide-web, please send an email
    * to license@prestashop.com so we can send you a copy immediately.
    *
    * DISCLAIMER
    *
    * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
    * versions in the future. If you wish to customize PrestaShop for your
    * needs please refer to http://www.prestashop.com for more information.
    *
    *  @author PrestaShop SA <contact@prestashop.com>
    *  @copyright  2007-2013 PrestaShop SA
    *  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
    *  International Registered Trademark & Property of PrestaShop SA
    * PrestaShop Webservice Library
    * @package PrestaShopWebservice
    */


use PrestaShop\PrestaShop\Adapter\ServiceLocator; // Had some methods before, can use these succesfully
use Symfony\Component\HttpFoundation\JsonResponse;

/*   

    Testing Image Library

 */

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;
// create an image manager instance with favored driver
$manager = new ImageManager(array('driver' => 'imagick'));
// to finally create image instances
$image = $manager->make('public/foo.jpg')->resize(300, 200);


class MymoduleMyControllerModuleFrontController extends ModuleFrontController
{

    public function postProcess()
    {

        // Get JSON as a string
        $json_str = file_get_contents('php://input');
        // Get as an object
        $data = json_decode($json_str, true);
        echo $data;
    }

    private function verify_order_data($order_data)
    {
        $appsecret = 'YOUR APP SECRET';
        $raw_post_data = file_get_contents('php://input');
        $header_signature = $headers['X-Hub-Signature'];

        // Signature matching
        $expected_signature = hash_hmac('sha1', $raw_post_data, $appsecret);

        $signature = '';
        if (
            strlen($header_signature) == 45 &&
            substr($header_signature, 0, 5) == 'sha1='
        ) {
            $signature = substr($header_signature, 5);
        }
        if (hash_equals($signature, $expected_signature)) {
            echo ('SIGNATURE_VERIFIED');
        }
    }
}
