       <?php
       $routes = [
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
       'createBill',
        'metadata'
       ];
       foreach ($routes as $file) {
           require __DIR__ . '/../src/routes/' . $file . '.php';
       }

