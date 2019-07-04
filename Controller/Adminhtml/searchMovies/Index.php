<?php
namespace RamosHenrique\AdminTMDB\Controller\Adminhtml\searchMovies;

use Magento\Backend\App\{
    Action,
    Action\Context
};
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Result\{
    PageFactory,
    Page
};

use RamosHenrique\AdminTMDB\Helpers\TMDBHelper;

class Index extends Action
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var TMDBHelper
     */
    protected $tmdbHelper;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

     /**
      * @var scopeConfig
      */
    protected $scopeConfig;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->tmdbHelper = new TMDBHelper();
        $this->resultPageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
        $this->context = $context;
        parent::__construct($context);
    }

    /**
    * Index Action
    *
    * @return Page
    */
    public function execute(): Page
    {
        $adminToken = $this->tmdbHelper->getAdminToken(
            $this->context->getAuth()->getUser()->getId()
        );

        $page = $this->resultPageFactory->create();
        $page->setActiveMenu('RamosHenrique_AdminTMDB::searchMovies');

        $cfg_text = $this->tmdbHelper->getConfig('general/tmdb_api_key');
        $page->getLayout()->getBlock('SearchMovies')
                    ->setCfgSample($cfg_text);

        return $page;
    }
}
