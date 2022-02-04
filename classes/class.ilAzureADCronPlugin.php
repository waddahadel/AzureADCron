<?php

require_once "Customizing/global/plugins/Services/Authentication/AuthenticationHook/AzureAD/classes/class.ilAzureADCron.php";
/**
 * Class ilAzureADCronPlugin
 *
 * @author Jephte Abijuru <jephte.abijuru@minervis.com>
 */
class ilAzureADCronPlugin extends ilCronHookPlugin
{


    const PLUGIN_CLASS_NAME = ilAzureADCronPlugin::class;
    const PLUGIN_ID = "azureadcron";
    const PLUGIN_NAME = "AzureADCron";
    /**
     * @var self|null
     */
    protected static $instance = null;


    /**
     * ilViMPCronPlugin constructor
     */
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @return self
     */
    public static function getInstance() : self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }


    /**
     * @inheritDoc
     */
    public function getPluginName() : string
    {
        return self::PLUGIN_NAME;
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstance(/*string*/ $a_job_id)/*: ?ilCronJob*/
    {
        switch ($a_job_id) {
            case ilAzureADCron::CRON_JOB_ID:
                return new ilAzureADCron();

            default:
                return null;
        }
    }


    /**
     * @inheritDoc
     */
    public function getCronJobInstances() : array
    {
        return [
            new ilAzureADCron()
        ];
    }
}
