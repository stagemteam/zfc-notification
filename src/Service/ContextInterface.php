<?php
/**
 * Context interface for getting message
 *
 * @category Agere
 * @package Agere_Progress
 * @author Popov Sergiy <popov@agere.com.ua>
 * @datetime: 06.11.2016 13:36
 */
namespace Stagem\ZfcNotification\Service;

use Zend\I18n\Translator\TranslatorAwareInterface;

interface ContextInterface extends TranslatorAwareInterface
{

    /**
     * Get raised event
     *
     * @return object
     */
    public function getTitle();

    /**
     * Related item
     *
     * @return object
     */
    public function getDescription();

    /**
     * Additional data for progress (logging)
     *
     * @return array
     */
    public function getUrl();

    /**
     * Progress message
     *
     * @return string
     */
    public function getType();
}