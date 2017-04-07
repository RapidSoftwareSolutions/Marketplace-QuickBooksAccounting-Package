<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');

class DandelionTest extends BaseTestCase
{

    public function testListMetrics()
    {

        $routes = [
            'deleteSalesreceipt',
            'updateSalesreceipt',
            'makeSalesreceiptVoid',
            'querySalesreceipt',
            'sendSalesreceipt',
            'getSalesreceiptAsPDF',
            'getSalesreceipt',
            'createSalesreceipt',
            'deleteRefundreceipt',
            'updateRefundreceipt',
            'getRefundreceipt',
            'queryRefundreceipt',
            'createRefundreceipt',
            'deletePurchaseorder',
            'updatePurchaseorder',
            'getPurchaseorder',
            'queryPurchaseorder',
            'createPurchaseorder',
            'deletePurchase',
            'queryPurchase',
            'updatePurchase',
            'getPurchase',
            'createPurchase',
            'deletePayment',
            'makePaymentVoid',
            'updatePayment',
            'getPayment',
            'queryPayment',
            'createPayment',
            'deleteJournalentry',
            'queryJournalentry',
            'updateJournalentry',
            'getJournalentry',
            'createJournalentry',
            'updateInvoice',
            'deleteInvoice',
            'makeInvoiceVoid',
            'queryInvoice',
            'sendInvoice',
            'getInvoiceAsPDF',
            'getInvoice',
            'createInvoice',
            'updateEstimate',
            'deleteEstimate',
            'sendEstimate',
            'getEstimateAsPDF',
            'getEstimate',
            'queryEstimate',
            'createEstimate',
            'deleteDeposit',
            'updateDeposit',
            'getDeposit',
            'queryDeposit',
            'createDeposit',
            'updateCreditmemo',
            'deleteCreditmemo',
            'queryCreditmemo',
            'getCreditmemo',
            'createCreditmemo',
            'deleteBillpayment',
            'updateCreditCardBillpayment',
            'updateCheckBillpayment',
            'getBillpayment',
            'createCreditCardBillpayment',
            'queryBillpayment',
            'createCheckBillpayment',
            'deleteBill',
            'updateBill',
            'queryBill',
            'getBill',
            'createBill'
        ];

        foreach ($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/QuickBooksAccounting/' . $file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in ' . $file . ' method');
        }
    }

}
