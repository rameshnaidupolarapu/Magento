<?php
namespace Ramesh\Connect\Controller\Adminhtml\Configuration;
use Magento\Backend\App\Action;
class Attributeadd extends \Magento\Backend\App\Action
{
 
    /**
     * @var \Magento\Framework\Controller\Result\ForwardFactory
     */
    protected $_coreRegistry = null;
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory ;    
    /**
     * @var \Magento\Framework\Stdlib\DateTime\DateTime
     */
    protected $_date;

    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    
    protected $entitytypemodel;


    /**
     * 
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Stdlib\DateTime\DateTime $date
     * @param \Ramesh\Connect\Model\EntityTypeFactory $entitytypemodel
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Stdlib\DateTime\DateTime $date,            
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Ramesh\Connect\Model\EntitytypeFactory $entitytypemodel)
    {
        parent::__construct($context);
        $this->storeManager = $storeManager;
        $this->_date = $date;
        $this->resultPageFactory  = $resultPageFactory;
        $this->_coreRegistry = $registry;
        $this->entitytypemodel=$entitytypemodel;
    }
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();        
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getLayout()->getBlock("attribute.add");
        return  $resultPage;
    }    
}
