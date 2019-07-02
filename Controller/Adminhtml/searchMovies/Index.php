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

use RamosHenrique\AdminTMDB\Traits\ConfigTrait;

class Index extends Action
{
    use ConfigTrait;

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
        parent::__construct($context);
        $this->resultPageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
    }

    /**
    * Index Action
    *
    * @return Page
    */
    public function execute(): Page
    {
        $page = $this->resultPageFactory->create();
        $page->setActiveMenu('RamosHenrique_AdminTMDB::searchMovies');

        $cfg_text = $this->getConfig('general/tmdb_api_key');
        $page->getLayout()->getBlock('SearchMovies')
                    ->setCfgSample($cfg_text);

        return $page;
    }
}
