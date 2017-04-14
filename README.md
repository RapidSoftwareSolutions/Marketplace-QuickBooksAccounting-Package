[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/QuickBooksAccounting/functions?utm_source=RapidAPIGitHub_QuickBooksAccountingFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# QuickBooksAccounting Package
QuickBooksAccounting
* Domain: ['Quickbooks Accounting](https://developer.intuit.com)
* Credentials: apiKey, apiSecret


## How to get credentials: 
0. Open [Intuit website](https://developer.intuit.com)
1. Register or log in
2. Go to [My app page](https://developer.intuit.com/v2/ui#/app/dashboard)
3. Register your application to get your apiKey and apiSecret

## QuickBooksAccounting.queryBill
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createBill
Creates new bill

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| billLines     | Array      | Individual line items of a transaction.
| vendorRefType | String     | Value of vendor type: name or value
| vendorRefValue| String     | Value of vendor ref

## QuickBooksAccounting.getBill
Retrieves the details of a bill that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| billId     | Number     | Id of your bill

## QuickBooksAccounting.updateBill
Updates a bill that has been previously created. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| billId                 | Number     | Id of your bill
| syncToken              | Number     | Version number of the object.
| billLines              | Array      | Individual line items of a transaction.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload. 
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| apAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| apAccountRefName       | String     | An identifying name for the object being referenced by apAccountRefId
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| dueDate                | String     | Date when the payment of the transaction is due.
| balance                | String     | The balance reflecting any payments made against the transaction.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteBill
Deletes existing bill. You must unlink any linked transactions associated with the bill object before deleting it.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| billId     | String     | Id of the bill
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.queryBillpayment
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createCheckBillpayment
Creates new bill payment by check

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| billpaymentLines  | Array      | Individual line items of a transaction.
| totalAmt          | String     | Indicates the total amount of the associated with this payment.
| vendorRefId       | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName     | String     | An identifying name for the object being referenced by vendorRefId
| bankAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload.
| bankAccountRefName| String     | An identifying name for the object being referenced by bankAccountRefId
| printStatus       | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.

## QuickBooksAccounting.createCreditCardBillpayment
Creates new bill payment by credit card

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Api key obtained from Intuit
| apiSecret       | credentials| Api secret obtained from Intuit
| accessToken     | String     | Access token provided by user
| tokenSecret     | String     | Token secret provided by user
| companyId       | Number     | Id of the company
| billpaymentLines| Array      | Individual line items of a transaction.
| totalAmt        | String     | Indicates the total amount of the associated with this payment.
| vendorRefId     | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName   | String     | An identifying name for the object being referenced by vendorRefId
| ccAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload.
| ccAccountRefName| String     | An identifying name for the object being referenced by ccAccountRefId

## QuickBooksAccounting.getBillpayment
Retrieves the details of a billpayment that has been previously created.

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Intuit
| apiSecret    | credentials| Api secret obtained from Intuit
| accessToken  | String     | Access token provided by user
| tokenSecret  | String     | Token secret provided by user
| companyId    | Number     | Id of the company
| billpaymentId| Number     | Id of your billpayment

## QuickBooksAccounting.updateCheckBillpayment
Updates existing bill payment by check. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| billpaymentId          | Number     | Id of the billpayment
| billpaymentLines       | Array      | Individual line items of a transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| syncToken              | Number     | Version number of the object.
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| bankAccountRefId       | String     | The ID for the referenced object as found in the Id field of the object payload.
| bankAccountRefName     | String     | An identifying name for the object being referenced by bankAccountRefId
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| apAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| apAccountRefName       | String     | An identifying name for the object being referenced by apAccountRefId
| processBillPayment     | Boolean    | Indicates that the payment should be processed by merchant account service.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.updateCreditCardBillpayment
Updates existing bill payment by credit card. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| syncToken              | Number     | Version number of the object.
| billpaymentId          | Number     | Id of the billpayment
| billpaymentLines       | Array      | Individual line items of a transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| ccAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload.
| ccAccountRefName       | String     | An identifying name for the object being referenced by bankAccountRefId
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| apAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| apAccountRefName       | String     | An identifying name for the object being referenced by apAccountRefId
| processBillPayment     | Boolean    | Indicates that the payment should be processed by merchant account service.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteBillpayment
This operation deletes the billpayment object specified in the request body. 

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Intuit
| apiSecret    | credentials| Api secret obtained from Intuit
| accessToken  | String     | Access token provided by user
| tokenSecret  | String     | Token secret provided by user
| companyId    | Number     | Id of the company
| billpaymentId| String     | Id of the billpayment
| syncToken    | String     | Version number of the object.

## QuickBooksAccounting.createCreditmemo
Create new credit memo

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| creditMemoLines| Array      | Individual line items of a transaction.
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId

## QuickBooksAccounting.getCreditmemo
Retrieves the details of a creditmemo that has been previously created.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Intuit
| apiSecret   | credentials| Api secret obtained from Intuit
| accessToken | String     | Access token provided by user
| tokenSecret | String     | Token secret provided by user
| companyId   | Number     | Id of the company
| creditMemoId| Number     | Id of your creditmemo

## QuickBooksAccounting.updateCreditmemo
Updates a credit memo that has been previously created. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| creditMemoId           | Number     | Id of your credit memo
| syncToken              | Number     | Version number of the object.
| creditMemoLines        | Array      | Individual line items of a transaction.
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| customerMemo           | String     | User-entered message to the customer; this message is visible to end user on their transactions.
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| applyTaxAfterDiscount  | Boolean    | If false or null, calculate the sales tax first, and then apply the discount. If true, subtract the discount first and then calculate the sales tax.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete .
| emailStatus            | String     | Email status of the invoice. Valid values: NotSet, NeedToSend, EmailSent
| billEmail              | String     | Identifies the e-mail address where the invoice is sent.
| balance                | String     | The balance reflecting any payments made against the transaction.
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| remainingCredit        | String     | Indicates the total credit amount still available to apply towards the payment.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.queryCreditmemo
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.deleteCreditmemo
Deletes existing creditmemo. 

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Intuit
| apiSecret   | credentials| Api secret obtained from Intuit
| accessToken | String     | Access token provided by user
| tokenSecret | String     | Token secret provided by user
| companyId   | Number     | Id of the company
| creditMemoId| String     | Id of the creditmemo
| syncToken   | String     | Version number of the object.

## QuickBooksAccounting.createDeposit
Creates new deposit

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| depositLines           | Array      | Individual line items of a transaction.
| depositToAccountRefId  | Number     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountRefName| String     | An identifying name for the object being referenced by depositToAccountRefId

## QuickBooksAccounting.queryDeposit
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getDeposit
Retrieves the details of a deposit that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| depositId  | Number     | Id of your deposit

## QuickBooksAccounting.updateDeposit
Updates a deposit that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| depositId              | Number     | Id of your deposit
| syncToken              | Number     | Version number of the object.
| depositLines           | Array      | Individual line items of a transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| privateNote            | String     | User entered, organization-private note about the transaction.
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| txnStatus              | String     | Status of the transaction. Valid values include: Draft, Overdue, Pending, Payable, Paid, Trash, and Unpaid.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| depositToAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountRefName| String     | An identifying name for the object being referenced by vendorRefId
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| cashBack               | JSON       | Cash back info
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteDeposit
Deletes existing deposit.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| depositId  | String     | Id of the deposit
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createEstimate
Create new estimate

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| estimateLines  | Array      | Individual line items of a transaction.
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId

## QuickBooksAccounting.queryEstimate
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getEstimate
Retrieves the details of a estimate that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| estimateId | Number     | Id of your estimate

## QuickBooksAccounting.getEstimateAsPDF
Retrieves the details of a estimate that has been previously created as link to PDf file.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| estimateId | Number     | Id of your estimate

## QuickBooksAccounting.sendEstimate
Send the specified estimate object via email.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| estimateId | Number     | Id of your estimate
| email      | String     | Email address

## QuickBooksAccounting.updateEstimate
Updates a estimate that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| estimateId             | Number     | Id of your estimate
| syncToken              | Number     | Version number of the object.
| estimateLines          | Array      | Individual line items of a transaction.
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnStatus              | String     | Status of the transaction. Valid values include: Accepted, Closed, Pending, Rejected
| linkedTxn              | Array      | Zero or more Invoice objects related to this transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| customerMemo           | String     | User-entered message to the customer; this message is visible to end user on their transactions.
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| shipMethodRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| shipMethodRefName      | String     | An identifying name for the object being referenced by shipMethodRefId
| dueDate                | String     | Date when the payment of the transaction is due.
| shipDate               | String     | Date for delivery of goods or services.
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| applyTaxAfterDiscount  | Boolean    | If false or null, calculate the sales tax first, and then apply the discount. If true, subtract the discount first and then calculate the sales tax.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete .
| emailStatus            | String     | Email status of the invoice. Valid values: NotSet, NeedToSend, EmailSent
| billEmail              | String     | Identifies the e-mail address where the invoice is sent.
| expirationDate         | String     | Date by which estimate must be accepted before invalidation.
| acceptedBy             | String     | Name of customer who accepted the estimate.
| acceptedDate           | String     | Date estimate was accepted.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteEstimate
Deletes existing estimate.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| estimateId | String     | Id of the estimate
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createInvoice
Create new invoice

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| invoiceLines   | Array      | Individual line items of a transaction.
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId

## QuickBooksAccounting.getInvoice
Retrieves the details of a invoice that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| invoiceId  | Number     | Id of your invoice

## QuickBooksAccounting.getInvoiceAsPDF
Retrieves the details of a invoice that has been previously created as link to PDF file.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| invoiceId  | Number     | Id of your invoice

## QuickBooksAccounting.sendInvoice
Send the specified invoice object via email.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| invoiceId  | Number     | Id of your invoice
| email      | String     | Email address

## QuickBooksAccounting.queryInvoice
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.makeInvoiceVoid
Use this operation to void an existing invoice object

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| invoiceId  | String     | Id of the invoice
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.updateInvoice
Updates an invoice that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| invoiceId              | Number     | Id of your estimate
| syncToken              | Number     | Version number of the object.
| invoiceLines           | Array      | Individual line items of a transaction.
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnStatus              | String     | Status of the transaction. Valid values include: Accepted, Closed, Pending, Rejected
| linkedTxn              | Array      | Zero or more Invoice objects related to this transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| shipMethodRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| shipMethodRefName      | String     | An identifying name for the object being referenced by shipMethodRefId
| dueDate                | String     | Date when the payment of the transaction is due.
| shipDate               | String     | Date for delivery of goods or services.
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| trackingNum            | String     | Shipping provider's tracking number for the delivery of the goods associated with the transaction.
| applyTaxAfterDiscount  | Boolean    | If false or null, calculate the sales tax first, and then apply the discount. If true, subtract the discount first and then calculate the sales tax.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete .
| emailStatus            | String     | Email status of the invoice. Valid values: NotSet, NeedToSend, EmailSent
| billEmail              | String     | Identifies the e-mail address where the invoice is sent.
| billEmailCc            | String     | Identifies the carbon copy e-mail address where the invoice is sent.
| billEmailBcc           | String     | Identifies the blind carbon copy e-mail address where the invoice is sent.
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| deposit                | String     | The deposit made towards this invoice.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.
| customerMemo           | String     | User-entered message to the customer; this message is visible to end user on their transactions.

## QuickBooksAccounting.deleteInvoice
Deletes existing invoice

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| invoiceId  | String     | Id of the invoice
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createJournalentry
Create new journal entry

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| journalentryLines | Array      | Individual line items of a transaction.
| journalCodeRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| journalCodeRefName| String     | An identifying name for the object being referenced by customerRefId

## QuickBooksAccounting.getJournalentry
Retrieves the details of a journal entry that has been previously created.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| journalentryId| Number     | Id of your journal entry

## QuickBooksAccounting.updateJournalentry
Updates an journal entry that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| journalentryId         | Number     | Id of your journal entry
| syncToken              | Number     | Version number of the object.
| journalentryLines      | Array      | Individual line items of a transaction.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| adjustment             | Boolean    | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. By default, this is recalculated by the system based on sub-items total and overridden.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.queryJournalentry
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.deleteJournalentry
Deletes existing journal entry. 

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| journalentryId| String     | Id of the journal entry
| syncToken     | String     | Version number of the object.

## QuickBooksAccounting.createPayment
Create new payment

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| totalAmt       | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes.
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId

## QuickBooksAccounting.queryPayment
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getPayment
Retrieves the details of a payment that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| paymentId  | Number     | Id of your payment

## QuickBooksAccounting.updatePayment
Updates a payment that has been previously created. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| paymentId              | Number     | Id of your payment
| syncToken              | Number     | Version number of the object.
| paymentLines           | Array      | Individual line items of a transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| txnStatus              | String     | The status of the transaction. For Payment objects, this status is always set to PAID.
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| aRAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| aRAccountRefName       | String     | An identifying name for the object being referenced by aRAccountRefId
| depositToAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountRefName| String     | An identifying name for the object being referenced by depositToAccountRefId
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| paymentRefNum          | String     | The reference number for the payment received. For example,  Check # for a check, envelope # for a cash donation.
| creditCardPayment      | JSON       | Information about a payment received by credit card. Inject with data only if the payment was transacted through Intuit Payments API.
| totalAmt               | String     | Indicates the total amount of the transaction. This includes the total of all the charges, allowances, and taxes. 
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.makePaymentVoid
Use this operation to void an existing payment object

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| paymentId  | String     | Id of the payment
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.deletePayment
Deletes existing payment

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| paymentId  | String     | Id of the payment
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createPurchase
Create new purchase

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| purchaseLines | Array      | Individual line items of a transaction.
| accountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| accountRefName| String     | An identifying name for the object being referenced by customerRefId
| paymentType   | String     | Payment Type can be  Cash, Check, or CreditCard

## QuickBooksAccounting.getPurchase
Retrieves the details of a purchase that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| purchaseId | Number     | Id of your purchase

## QuickBooksAccounting.updatePurchase
Updates a purchase that has been previously created. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| purchaseId             | Number     | Id of your purchase
| syncToken              | Number     | Version number of the object.
| paymentType            | String     | Type can be Cash, Check, or CreditCard.
| purchaseLines          | Array      | Individual line items of a transaction.
| accountRefId           | String     | The ID for the referenced object as found in the Id field of the object payload. 
| accountRefName         | String     | An identifying name for the object being referenced by accountRefId
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| entityRefId            | String     | The ID for the referenced object as found in the Id field of the object payload. 
| entityRefName          | String     | An identifying name for the object being referenced by entityRefId
| credit                 | Boolean    | False—it represents a charge.True—it represents a refund. Valid only for CreditCardpayment type.
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.queryPurchase
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.deletePurchase
Deletes existing purchase. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| purchaseId | String     | Id of the purchase
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createPurchaseorder
Create new purchase order

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| purchaseorderLines| Array      | Individual line items of a transaction.
| vendorRefId       | String     | The ID for the referenced object as found in the Id field of the object payload. 
| vendorRefName     | String     | An identifying name for the object being referenced by vendorRefId
| aPAccountRefID    | String     | The ID for the referenced object as found in the Id field of the object payload. 
| aPAccountRefName  | String     | An identifying name for the object being referenced by aPAccountRefID

## QuickBooksAccounting.queryPurchaseorder
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getPurchaseorder
Retrieves the details of a purchase order that has been previously created.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| purchaseorderId| Number     | Id of your purchase

## QuickBooksAccounting.updatePurchaseorder
Updates a purchase order that has been previously created. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| purchaseorderId        | Number     | Id of your purchase order
| syncToken              | Number     | Version number of the object.
| purchaseorderLines     | Array      | Individual line items of a transaction.
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload. 
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| aPAccountRefID         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| aPAccountRefName       | String     | An identifying name for the object being referenced by aPAccountRefID
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| privateNote            | String     | User entered, organization-private note about the transaction.
| linkedTxn              | Array      | Zero or more Invoice objects related to this transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| memo                   | String     | A message for the vendor. This text appears on the Purchase Order object sent to the vendor.
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| dueDate                | String     | Date when the payment of the transaction is due.
| vendorAddr             | JSON       | Address to which the payment should be sent.
| shipAddr               | JSON       | Address to which the vendor shipped or will ship any goods associated with the purchase.
| shipMethodRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| shipMethodRefName      | String     | An identifying name for the object being referenced by shipMethodRefId
| poStatus               | String     | Purchase order status. Valid values are: Open and Closed.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deletePurchaseorder
Deletes existing purchase order.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| purchaseorderId| String     | Id of the purchase order
| syncToken      | String     | Version number of the object.

## QuickBooksAccounting.createRefundreceipt
Create new refund receipt

| Field               | Type       | Description
|---------------------|------------|----------
| apiKey              | credentials| Api key obtained from Intuit
| apiSecret           | credentials| Api secret obtained from Intuit
| accessToken         | String     | Access token provided by user
| tokenSecret         | String     | Token secret provided by user
| companyId           | Number     | Id of the company
| refundLines         | Array      | Individual line items of a transaction.
| depositToAccountId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountName| String     | An identifying name for the object being referenced by depositToAccountId

## QuickBooksAccounting.queryRefundreceipt
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getRefundreceipt
Retrieves the details of a refund receipt that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| refundId   | Number     | Id of your refund receipt

## QuickBooksAccounting.updateRefundreceipt
Updates an refund receipt that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| refundId               | Number     | Id of your refund receipt
| syncToken              | Number     | Version number of the object.
| refundLines            | Array      | Individual line items of a transaction.
| depositToAccountRefId  | Number     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountRefName| String     | An identifying name for the object being referenced by depositToAccountRefId
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| customerMemo           | String     | User-entered message to the customer; this message is visible to end user on their transactions.
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| applyTaxAfterDiscount  | Boolean    | If false or null, calculate the sales tax first, and then apply the discount. If true, subtract the discount first and then calculate the sales tax.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.
| billEmail              | String     | Identifies the e-mail address where the invoice is sent.
| balance                | String     | The balance reflecting any payments made against the transaction.
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| paymentRefNum          | String     | The reference number for the payment received. For example,  Check # for a check, envelope # for a cash donation.
| paymentType            | String     | Payment Type can be  Cash, Check, or CreditCard
| checkPayment           | JSON       | Information about a check payment for the transaction.
| creditCardPayment      | JSON       | Information about a credit card for the transaction.
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteRefundreceipt
Deletes existing refund receipt. You must unlink any linked transactions associated with the refund receipt object before deleting it.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| refundId   | String     | Id of the refund receipt
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createSalesreceipt
Create new sales receipt

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| Api key obtained from Intuit
| apiSecret        | credentials| Api secret obtained from Intuit
| accessToken      | String     | Access token provided by user
| tokenSecret      | String     | Token secret provided by user
| companyId        | Number     | Id of the company
| salesreceiptLines| Array      | Individual line items of a transaction.

## QuickBooksAccounting.getSalesreceipt
Retrieves the details of a invoice that has been previously created.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| salesreceiptId| Number     | Id of your sales receipt

## QuickBooksAccounting.getSalesreceiptAsPDF
Retrieves the details of a sales receipt that has been previously created as link to PDf file.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| salesreceiptId| Number     | Id of your sales receipt

## QuickBooksAccounting.sendSalesreceipt
Send the specified sales receipt object via email.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| salesreceiptId| Number     | Id of your sales receipt
| email         | String     | Email address

## QuickBooksAccounting.querySalesreceipt
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.makeSalesreceiptVoid
Use this operation to void an existing sales receipt object

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| salesreceiptId| String     | Id of the sales receipt
| syncToken     | String     | Version number of the object.

## QuickBooksAccounting.updateSalesreceipt
Updates an sales receipt that has been previously created.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| salesreceiptId         | Number     | Id of your sales receipt
| syncToken              | Number     | Version number of the object.
| salesreceiptLines      | Array      | Individual line items of a transaction.
| customField            | Array      | Custom field or data extension.
| docNumber              | String     | Reference number for the transaction.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| privateNote            | String     | User entered, organization-private note about the transaction.
| txnTaxDetail           | JSON       | This data type provides information for taxes charged on the transaction as a whole. 
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| customerMemo           | String     | User-entered message to the customer; this message is visible to end user on their transactions.
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| shipMethodRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| shipMethodRefName      | String     | An identifying name for the object being referenced by shipMethodRefId
| shipDate               | String     | Date for delivery of goods or services.
| trackingNum            | String     | Shipping provider's tracking number for the delivery of the goods associated with the transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.
| emailStatus            | String     | Email status of the invoice. Valid values: NotSet, NeedToSend, EmailSent
| billEmail              | String     | Identifies the e-mail address where the invoice is sent.
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| paymentRefNum          | String     | The reference number for the payment received. For example,  Check # for a check, envelope # for a cash donation.
| creditCardPayment      | JSON       | Information about a payment received by credit card. Inject with data only if the payment was transacted through Intuit Payments API.
| txnSource              | String     | Used internally to specify originating source of a credit card transaction.
| applyTaxAfterDiscount  | Boolean    | If false or null, calculate the sales tax first, and then apply the discount. If true, subtract the discount first and then calculate the sales tax.
| depositToAccountRefId  | Number     | The ID for the referenced object as found in the Id field of the object payload. 
| depositToAccountRefName| String     | An identifying name for the object being referenced by depositToAccountRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteSalesreceipt
Deletes existing sales receipt.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| salesreceiptId| String     | Id of the sales receipt
| syncToken     | String     | Version number of the object.

## QuickBooksAccounting.createTransfer
Create new transfer

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| amount            | String     | Amount to transfer
| fromAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| fromAccountRefName| String     | An identifying name for the object being referenced by fromAccountRefId
| toAccountRefId    | String     | The ID for the referenced object as found in the Id field of the object payload. 
| toAccountRefName  | String     | An identifying name for the object being referenced by toAccountRefId

## QuickBooksAccounting.getTransfer
Retrieves the details of a transfer that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| transferId | Number     | Id of your transfer

## QuickBooksAccounting.updateTransfer
Update existing transfer

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| transferId             | Number     | Id of the transfer
| amount                 | String     | Amount to transfer
| fromAccountRefId       | String     | The ID for the referenced object as found in the Id field of the object payload. 
| fromAccountRefName     | String     | An identifying name for the object being referenced by fromAccountRefId
| toAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| toAccountRefName       | String     | An identifying name for the object being referenced by toAccountRefId
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| privateNote            | String     | User entered, organization-private note about the transaction.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.queryTransfer
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.deleteTransfer
Deletes existing transfer. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| transferId | String     | Id of the transfer
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.queryTimeactivity
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createEmployeeTimeactivity
Create new timactivity for employee

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| startTime      | String     | Start of time activity
| endTime        | String     | End of time activity
| companyId      | Number     | Id of the company
| employeeRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| employeeRefName| String     | An identifying name for the object being referenced by employeeRefId
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId
| hourlyRate     | String     | Hourly bill rate of the employee for this time activity.

## QuickBooksAccounting.createVendorTimeactivity
Create new timactivity for vendor

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| startTime      | String     | Start of time activity
| endTime        | String     | End of time activity
| companyId      | Number     | Id of the company
| vendorRefId    | String     | The ID for the referenced object as found in the Id field of the object payload. 
| vendorRefName  | String     | An identifying name for the object being referenced by vendorRefId
| customerRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName| String     | An identifying name for the object being referenced by customerRefId
| hourlyRate     | String     | Hourly bill rate of the vendor for this time activity.

## QuickBooksAccounting.getTimeactivity
Retrieves the details of a time activity that has been previously created.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| timeactivityId| Number     | Id of your time activity

## QuickBooksAccounting.updateEmployeeTimeactivity
Update existing timactivity for employee. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| timeactivityId         | String     | Id of time activity
| syncToken              | String     | Version number of the object.
| startTime              | String     | Start of time activity
| endTime                | String     | End of time activity
| companyId              | Number     | Id of the company
| employeeRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| employeeRefName        | String     | An identifying name for the object being referenced by employeeRefId
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| hourlyRate             | String     | Hourly bill rate of the employee for this time activity.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| billableStatus         | String     | Billable status of the time recorded. Valid values: Billable, NotBillable, HasBeenBilled. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| itemRefId              | String     | The ID for the referenced object as found in the Id field of the object payload. 
| itemRefName            | String     | An identifying name for the object being referenced by itemRefId
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| taxable                | Boolean    | True if the time recorded is both billable and taxable.
| breakHours             | String     | Hours of break taken between StartTime and EndTime.
| breakMinutes           | String     | Minutes of break taken between StartTime and EndTime.
| description            | String     | Description of work completed during time activity.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.updateVendorTimeactivity
Update existing timeactivity for vendor. Writable fields omitted from the request body are set to NULL.

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| timeactivityId         | String     | Id of time activity
| syncToken              | String     | Version number of the object.
| startTime              | String     | Start of time activity
| endTime                | String     | End of time activity
| companyId              | Number     | Id of the company
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload. 
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| customerRefId          | String     | The ID for the referenced object as found in the Id field of the object payload. 
| customerRefName        | String     | An identifying name for the object being referenced by customerRefId
| hourlyRate             | String     | Hourly bill rate of the employee for this time activity.
| txnDate                | String     | The date entered by the user when this transaction occurred. 
| billableStatus         | String     | Billable status of the time recorded. Valid values: Billable, NotBillable, HasBeenBilled. 
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| itemRefId              | String     | The ID for the referenced object as found in the Id field of the object payload. 
| itemRefName            | String     | An identifying name for the object being referenced by itemRefId
| classRefId             | String     | The ID for the referenced object as found in the Id field of the object payload. 
| classRefName           | String     | An identifying name for the object being referenced by classRefId
| taxable                | Boolean    | True if the time recorded is both billable and taxable.
| breakHours             | String     | Hours of break taken between StartTime and EndTime.
| breakMinutes           | String     | Minutes of break taken between StartTime and EndTime.
| description            | String     | Description of work completed during time activity.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.

## QuickBooksAccounting.deleteTimeactivity
Deletes existing time activity. 

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| timeactivityId| String     | Id of the time activity
| syncToken     | String     | Version number of the object.

## QuickBooksAccounting.createVendorcredit
Creates new vendor credit

| Field            | Type       | Description
|------------------|------------|----------
| apiKey           | credentials| Api key obtained from Intuit
| apiSecret        | credentials| Api secret obtained from Intuit
| accessToken      | String     | Access token provided by user
| tokenSecret      | String     | Token secret provided by user
| companyId        | Number     | Id of the company
| vendorcreditLines| Array      | Individual line items of a transaction.
| vendorRefId      | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName    | String     | An identifying name for the object being referenced by vendorRefId

## QuickBooksAccounting.getVendorcredit
Retrieves the details of a vendor credit that has been previously created.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| vendorcreditId| Number     | Id of your vendor credit

## QuickBooksAccounting.updateVendorcredit
Update existing vendor credit

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| vendorcreditId         | Number     | Id of the vendor credit
| syncToken              | Number     | Version number of the object.
| vendorcreditLines      | Array      | Individual line items of a transaction.
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| docNumber              | String     | Reference number for the transaction.
| departmentRefId        | String     | The ID for the referenced object as found in the Id field of the object payload. 
| departmentRefName      | String     | An identifying name for the object being referenced by departmentRefId
| apAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| apAccountRefName       | String     | An identifying name for the object being referenced by apAccountRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| exchangeRate           | String     | The number of home currency units it takes to equal one unit of currency specified by currencyRef
| globalTaxCalculation   | String     | Method in which tax is applied. Allowed values are: TaxExcluded, TaxInclusive, and NotApplicable.
| transactionLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.
| privateNote            | String     | User entered, organization-private note about the transaction.

## QuickBooksAccounting.queryVendorcredit
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.deleteVendorcredit
This operation deletes the vendor credit object specified in the request body. 

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| vendorcreditId| String     | Id of the vendor credit
| syncToken     | String     | Version number of the object.

## QuickBooksAccounting.createAccount
Create new account

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| name          | String     | User recognizable name for the Account. attribute must not contain double quotes (") or colon (:).
| accountType   | String     | A detailed account classification that specifies the use of this account. The type is based on the Classification. 
| accountSubType| String     | The account sub-type classification and is based on the AccountType value. 
| acctNum       | String     | User-defined account number to help the user in identifying the account within the chart-of-accounts and in deciding what should be posted to the account
| taxCodeRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| taxCodeRefName| String     | An identifying name for the object being referenced by taxCodeRefId

## QuickBooksAccounting.getAccount
Retrieves the details of a account that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| accountId  | Number     | Id of your account

## QuickBooksAccounting.updateAccount
Update existing account. he request body must include all writable fields of the existing object as returned in a read response. Writable fields omitted from the request body are set to NULL.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| accountId      | Number     | Id of the account
| syncToken      | Number     | Version number of the object.
| name           | String     | User recognizable name for the Account. attribute must not contain double quotes (") or colon (:).
| accountType    | String     | A detailed account classification that specifies the use of this account. The type is based on the Classification. 
| accountSubType | String     | The account sub-type classification and is based on the AccountType value. 
| accountAlias   | String     | A user friendly name for the account. It must be unique across all account categories.
| txnLocationType| String     | The account location. Valid values include: WithinFrance, FranceOverseas, OutsideFranceWithEU, OutsideEU.For France locales, only.
| active         | Boolean    | Whether or not active inactive accounts may be hidden from most display purposes and may not be posted to.
| classification | Boolean    | The classification of an account. Not supported for non-posting accounts. Valid values include: Asset, Equity, Expense, Liability, Revenue
| acctNum        | String     | User-defined account number to help the user in identifying the account within the chart-of-accounts and in deciding what should be posted to the account
| description    | String     | User entered description for the account, which may include user entered information to guide bookkeepers/accountants in deciding what journal entries to post to the account.
| taxCodeRefId   | String     | The ID for the referenced object as found in the Id field of the object payload. 
| taxCodeRefName | String     | An identifying name for the object being referenced by taxCodeRefId
| parentRefId    | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName  | String     | An identifying name for the object being referenced by parentRefId
| currencyRefId  | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName| String     | An identifying name for the currency being referenced by currencyRefId

## QuickBooksAccounting.queryAccount
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.queryBudget
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createClass
Create new class

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Intuit
| apiSecret    | credentials| Api secret obtained from Intuit
| accessToken  | String     | Access token provided by user
| tokenSecret  | String     | Token secret provided by user
| companyId    | Number     | Id of the company
| name         | String     | User recognizable name for the class.
| parentRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName| String     | An identifying name for the object being referenced by parentRefId

## QuickBooksAccounting.getClass
Retrieves the details of a class that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| classId    | Number     | Id of your class

## QuickBooksAccounting.updateClass
Update existing class. he request body must include all writable fields of the existing object as returned in a read response. Writable fields omitted from the request body are set to NULL.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| classId           | Number     | Id of the class
| syncToken         | Number     | Version number of the object.
| name              | String     | User recognizable name for the class.
| parentRefId       | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName     | String     | An identifying name for the object being referenced by parentRefId
| fullyQualifiedName| String     | Fully qualified name of the entity. The fully qualified name prepends the topmost parent, followed by each sub class separated by colons. 
| active            | Boolean    | If true, this entity is currently enabled for use by QuickBooks.

## QuickBooksAccounting.queryClass
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createCompanyCurrency
Create new company currency

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| code       | String     | A three letter string representing the ISO 4217 code for the currency. For example, USD, AUD, EUR, and so on.

## QuickBooksAccounting.queryCompanyCurrency
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getCompanyCurrency
Retrieves the details of a company currency that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| currencyId | Number     | Id of your company currency

## QuickBooksAccounting.updateCompanyCurrency
Update existing company currency

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| currencyId | Number     | Id of the currency
| syncToken  | Number     | Version number of the object.
| code       | String     | A three letter string representing the ISO 4217 code for the currency. For example, USD, AUD, EUR, and so on.
| active     | Boolean    | If true, this entity is currently enabled for use by QuickBooks.

## QuickBooksAccounting.deleteCompanyCurrency
This operation deletes the company currency object specified in the request body. 

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| currencyId | String     | Id of the company currency
| syncToken  | String     | Version number of the object.

## QuickBooksAccounting.createCustomer
Create new customer

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| displayName| String     | The name of the person or organization as displayed. Must be unique across all Customer, Vendor, and Employee objects. Cannot be removed with sparse update. 
| title      | String     | Title of the person.
| givenName  | String     | Given name or first name of a person.
| middleName | String     | Middle name of the person.
| familyName | String     | Family name or the last name of the person.
| suffix     | String     | Suffix of the name. For example, Jr.

## QuickBooksAccounting.getCustomer
Retrieves the details of a customer that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| customerId | Number     | Id of your customer

## QuickBooksAccounting.updateCustomer
Update existing customer

| Field                  | Type       | Description
|------------------------|------------|----------
| apiKey                 | credentials| Api key obtained from Intuit
| apiSecret              | credentials| Api secret obtained from Intuit
| accessToken            | String     | Access token provided by user
| tokenSecret            | String     | Token secret provided by user
| companyId              | Number     | Id of the company
| customerId             | Number     | Id of the customer
| syncToken              | String     | Version number of the object.
| displayName            | String     | The name of the person or organization as displayed. Must be unique across all Customer, Vendor, and Employee objects. Cannot be removed with sparse update. 
| title                  | String     | Title of the person.
| givenName              | String     | Given name or first name of a person.
| middleName             | String     | Middle name of the person.
| familyName             | String     | Family name or the last name of the person.
| suffix                 | String     | Suffix of the name. For example, Jr.
| companyName            | String     | The name of the company associated with the person or organization.
| printOnCheckName       | String     | Name of the person or organization as printed on a check. If not provided, this is populated from DisplayName. 
| active                 | String     | If true, this entity is currently enabled for use by QuickBooks.
| primaryPhone           | String     | Primary phone number.
| alternatePhone         | String     | Alternate phone number.
| mobile                 | String     | Mobile phone number.
| fax                    | String     | Fax phone number.
| primaryEmailAddr       | String     | Primary email address.
| webAddr                | String     | Website address.
| defaultTaxCodeRefId    | String     | The ID for the referenced object as found in the Id field of the object payload.
| defaultTaxCodeRefName  | String     | An identifying name for the object being referenced by defaultTaxCodeRefId
| taxable                | Boolean    | If true, transactions for this customer are taxable.
| billAddr               | JSON       | Bill-to address of the Invoice. 
| shipAddr               | JSON       | Identifies the address where the goods must be shipped. 
| notes                  | String     | Free form text describing the Customer.
| job                    | Boolean    | If true, this is a Job or sub-customer. If false or null, this is a top level customer, not a Job or sub-customer.
| billWithParent         | Boolean    | If true, this Customer object is billed with its parent.
| parentRefId            | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName          | String     | An identifying name for the object being referenced by parentRefId
| level                  | Number     | Specifies the level of the hierarchy in which the entity is located. Zero specifies the top level of the hierarchy; anything above will be level with respect to the parent.          Constraints:up to 5 levels
| salesTermRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTermRefName       | String     | An identifying name for the object being referenced by salesTermRefId
| paymentMethodRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| paymentMethodRefName   | String     | An identifying name for the object being referenced by paymentMethodRefId
| currencyRefId          | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName        | String     | An identifying name for the currency being referenced by currencyRefId
| preferredDeliveryMethod| String     | Preferred delivery method. Values are Print, Email, or None.
| resaleNum              | String     | Resale number or some additional info about the customer.
| aRAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload. 
| aRAccountRefName       | String     | An identifying name for the object being referenced by aRAccountRefId

## QuickBooksAccounting.queryCustomer
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createDepartment
Create new department

| Field        | Type       | Description
|--------------|------------|----------
| apiKey       | credentials| Api key obtained from Intuit
| apiSecret    | credentials| Api secret obtained from Intuit
| accessToken  | String     | Access token provided by user
| tokenSecret  | String     | Token secret provided by user
| companyId    | Number     | Id of the company
| name         | String     | User recognizable name for the department.
| parentRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName| String     | An identifying name for the object being referenced by parentRefId

## QuickBooksAccounting.getDepartment
Retrieves the details of a department that has been previously created.

| Field       | Type       | Description
|-------------|------------|----------
| apiKey      | credentials| Api key obtained from Intuit
| apiSecret   | credentials| Api secret obtained from Intuit
| accessToken | String     | Access token provided by user
| tokenSecret | String     | Token secret provided by user
| companyId   | Number     | Id of the company
| departmentId| Number     | Id of your department

## QuickBooksAccounting.updateDepartment
Update existing department. The request body must include all writable fields of the existing object as returned in a read response. Writable fields omitted from the request body are set to NULL.

| Field             | Type       | Description
|-------------------|------------|----------
| apiKey            | credentials| Api key obtained from Intuit
| apiSecret         | credentials| Api secret obtained from Intuit
| accessToken       | String     | Access token provided by user
| tokenSecret       | String     | Token secret provided by user
| companyId         | Number     | Id of the company
| departmentId      | Number     | Id of the department
| syncToken         | Number     | Version number of the object.
| name              | String     | User recognizable name for the class.
| parentRefId       | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName     | String     | An identifying name for the object being referenced by parentRefId
| fullyQualifiedName| String     | Fully qualified name of the entity. The fully qualified name prepends the topmost parent, followed by each sub class separated by colons. 
| active            | Boolean    | If true, this entity is currently enabled for use by QuickBooks.
| subDepartment     | Boolean    | Specifies whether this Department object is a SubDepartment.

## QuickBooksAccounting.queryDepartment
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createEmployee
Create new employee

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| givenName  | String     | Given name or first name of a person.
| familyName | String     | Family name or the last name of the person.
| primaryAddr| JSON       | Represents the physical street address for this employee.

## QuickBooksAccounting.getEmployee
Retrieves the details of a employee that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| employeeId | Number     | Id of your employee

## QuickBooksAccounting.updateEmployee
Update existing employee

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Api key obtained from Intuit
| apiSecret       | credentials| Api secret obtained from Intuit
| accessToken     | String     | Access token provided by user
| tokenSecret     | String     | Token secret provided by user
| companyId       | Number     | Id of the company
| employeeId      | Number     | Id of the employee
| givenName       | String     | Given name or first name of a person.
| familyName      | String     | Family name or the last name of the person.
| primaryAddr     | JSON       | Represents the physical street address for this employee.
| title           | String     | Title of the person.
| middleName      | String     | Middle name of the person.
| suffix          | String     | Suffix of the name. For example, Jr.
| organization    | Boolean    | true--the object represents an organization. false--the object represents a person.
| displayName     | String     | The name of the person or organization as displayed. Must be unique across all Customer, Vendor, and Employee objects. Cannot be removed with sparse update. 
| printOnCheckName| String     | Name of the person or organization as printed on a check. If not provided, this is populated from DisplayName. 
| active          | Boolean    | If true, this entity is currently enabled for use by QuickBooks.
| primaryPhone    | String     | Primary phone number.
| mobile          | String     | Mobile phone number.
| primaryEmailAddr| String     | Primary email address.
| employeeNumber  | String     | Specifies the ID number of the employee in the employer's directory.
| ssn             | String     | Social security number (SSN) of the employee. 
| primaryAddr     | String     | Represents the physical street address for this employee.
| billableTime    | Boolean    | If true, this entity is currently enabled for use by QuickBooks.
| billRate        | String     | This attribute can only be set if BillableTime is true. Not supported when QuickBooks Payroll is enabled.
| birthDate       | String     | Birth date of the employee.
| gender          | String     | Gender of the employee. To clear the gender value, set to Null in a full update request. Supported values include: Male or Female.
| hiredDate       | String     | Hire date of the employee.
| releasedDate    | String     | Release date of the employee.

## QuickBooksAccounting.queryEmployee
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.queryItem
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createItem
Create new item

| Field                | Type       | Description
|----------------------|------------|----------
| apiKey               | credentials| Api key obtained from Intuit
| apiSecret            | credentials| Api secret obtained from Intuit
| accessToken          | String     | Access token provided by user
| tokenSecret          | String     | Token secret provided by user
| companyId            | Number     | Id of the company
| name                 | String     | User recognizable name for the item.
| incomeAccountRefId   | String     | The ID for the referenced object as found in the Id field of the object payload. 
| incomeAccountRefName | String     | An identifying name for the object being referenced by incomeAccountRefId
| expenseAccountRefId  | String     | The ID for the referenced object as found in the Id field of the object payload.
| expenseAccountRefName| String     | An identifying name for the object being referenced by expenseAccountRefId
| assetAccountRefId    | String     | The ID for the referenced object as found in the Id field of the object payload.
| assetAccountRefName  | String     | An identifying name for the object being referenced by assetAccountRefId
| invStartDate         | String     | Date of opening balance for the inventory transaction.

## QuickBooksAccounting.getItem
Retrieves the details of a item that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| itemId     | Number     | Id of your item

## QuickBooksAccounting.updateItem
Update existing item

| Field                 | Type       | Description
|-----------------------|------------|----------
| apiKey                | credentials| Api key obtained from Intuit
| apiSecret             | credentials| Api secret obtained from Intuit
| accessToken           | String     | Access token provided by user
| tokenSecret           | String     | Token secret provided by user
| companyId             | Number     | Id of the company
| itemId                | Number     | Id of the item
| syncToken             | String     | Version number of the object.
| name                  | String     | User recognizable name for the item.
| incomeAccountRefId    | String     | The ID for the referenced object as found in the Id field of the object payload. 
| incomeAccountRefId    | String     | An identifying name for the object being referenced by incomeAccountRefId
| expenseAccountRefId   | String     | The ID for the referenced object as found in the Id field of the object payload.
| expenseAccountRefName | String     | An identifying name for the object being referenced by expenseAccountRefId
| assetAccountRefId     | String     | The ID for the referenced object as found in the Id field of the object payload.
| assetAccountRefName   | String     | An identifying name for the object being referenced by assetAccountRefId
| invStartDate          | String     | Date of opening balance for the inventory transaction.
| sku                   | String     | The stock keeping unit (SKU) for this Item.
| description           | String     | Description of the item.
| active                | Boolean    | If true, the object is currently enabled for use by QuickBooks.
| subItem               | Boolean    | If true, this is a sub item. If false or null, this is a top-level item.
| parentRefId           | String     | The ID for the referenced object as found in the Id field of the object payload. 
| parentRefName         | String     | An identifying name for the object being referenced by parentRefId
| taxable               | Boolean    | If true, transactions for this item are taxable. Applicable to US companies, only.
| salesTaxIncluded      | Boolean    | True if the sales tax is included in the item amount, and therefore is not calculated for the transaction.
| unitPrice             | String     | Price of the unit
| purchaseDesc          | String     | Purchase description for the item.
| purchaseTaxIncluded   | Boolean    | True if the purchase tax is included in the item amount, and therefore is not calculated for the transaction.
| purchaseCost          | String     | Amount paid when buying or ordering the item, as expressed in the home currency.
| trackQtyOnHand        | Boolean    | True if there is quantity on hand to be tracked.
| qtyOnHand             | String     | Current quantity of the Inventory items available for sale. Not used for Service or NonInventory type items.
| salesTaxCodeRefId     | String     | The ID for the referenced object as found in the Id field of the object payload. 
| salesTaxCodeRefName   | String     | An identifying name for the object being referenced by salesTaxCodeRefId
| purchaseTaxCodeRefId  | String     | The ID for the referenced object as found in the Id field of the object payload. 
| purchaseTaxCodeRefName| String     | An identifying name for the object being referenced by purchaseTaxCodeRefId

## QuickBooksAccounting.createPaymentMethod
Create new payment method

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| name       | String     | User recognizable name for the payment method.

## QuickBooksAccounting.getPaymentMethod
Retrieves the details of a payment method that has been previously created.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| paymentmethodId| Number     | Id of your payment method

## QuickBooksAccounting.updatePaymentMethod
Update existing payment method. Writable fields omitted from the request body are set to NULL.

| Field          | Type       | Description
|----------------|------------|----------
| apiKey         | credentials| Api key obtained from Intuit
| apiSecret      | credentials| Api secret obtained from Intuit
| accessToken    | String     | Access token provided by user
| tokenSecret    | String     | Token secret provided by user
| companyId      | Number     | Id of the company
| paymentmethodId| Number     | Id of the payment method
| syncToken      | Number     | Version number of the object.
| name           | String     | User recognizable name for the payment method.
| type           | String     | Defines the type of payment. Valid values include CREDIT_CARD or NON_CREDIT_CARD.
| active         | Boolean    | If true, this entity is currently enabled for use by QuickBooks.

## QuickBooksAccounting.queryPaymentMethod
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createTaxAgency
Create new tax agency

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| displayName| String     | User recognizable name for the tax agency.

## QuickBooksAccounting.getTaxAgency
Retrieves the details of a tax agency that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| taxAgencyId| Number     | Id of your tax agency

## QuickBooksAccounting.queryTaxAgency
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.queryTaxCode
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.getTaxCode
Retrieves the details of a tax code that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| taxCodeId  | Number     | Id of your tax code

## QuickBooksAccounting.getTaxRate
Retrieves the details of a tax rate that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| taxRateId  | Number     | Id of your tax rate

## QuickBooksAccounting.queryTaxCode
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createTaxService
Create new tax service

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Api key obtained from Intuit
| apiSecret     | credentials| Api secret obtained from Intuit
| accessToken   | String     | Access token provided by user
| tokenSecret   | String     | Token secret provided by user
| companyId     | Number     | Id of the company
| taxCode       | String     | Name of new tax code. 
| taxRateDetails| Array      | One or more tax rate specifications.

## QuickBooksAccounting.createTerm
Create new term

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| name       | String     | User recognizable name for the term.
| dueDays    | Number     | Number of days from delivery of goods or services until the payment is due. 0 - 999

## QuickBooksAccounting.getTerm
Retrieves the details of a term that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| termId     | Number     | Id of your term

## QuickBooksAccounting.updateTerm
Update a term that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| termId     | Number     | Id of your term
| syncToken  | Number     | Version number of the object.
| name       | String     | User recognizable name for the term.
| dueDays    | Number     | Number of days from delivery of goods or services until the payment is due. 0 - 999

## QuickBooksAccounting.queryTerm
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

## QuickBooksAccounting.createVendor
Create new vendor

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| displayName| String     | The name of the organization as displayed. Must be unique across all Customer, Vendor, and Employee objects. Cannot be removed with sparse update. 
| title      | String     | Title of the person.
| givenName  | String     | Given name or first name of a person.
| middleName | String     | Middle name of the person.
| familyName | String     | Family name or the last name of the person.
| suffix     | String     | Suffix of the name. For example, Jr.

## QuickBooksAccounting.getVendor
Retrieves the details of a vendor that has been previously created.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| vendorId   | Number     | Id of your vendor

## QuickBooksAccounting.updateVendor
Update existing vendor

| Field           | Type       | Description
|-----------------|------------|----------
| apiKey          | credentials| Api key obtained from Intuit
| apiSecret       | credentials| Api secret obtained from Intuit
| accessToken     | String     | Access token provided by user
| tokenSecret     | String     | Token secret provided by user
| companyId       | Number     | Id of the company
| vendorId        | Number     | Id of the vendor
| syncToken       | String     | Version number of the object.
| displayName     | String     | The name of the person or organization as displayed. Must be unique across all Customer, Vendor, and Employee objects. Cannot be removed with sparse update. 
| title           | String     | Title of the person.
| givenName       | String     | Given name or first name of a person.
| middleName      | String     | Middle name of the person.
| familyName      | String     | Family name or the last name of the person.
| suffix          | String     | Suffix of the name. For example, Jr.
| companyName     | String     | The name of the company associated with the person or organization.
| printOnCheckName| String     | Name of the person or organization as printed on a check. If not provided, this is populated from DisplayName. 
| active          | String     | If true, this entity is currently enabled for use by QuickBooks.
| primaryPhone    | String     | Primary phone number.
| alternatePhone  | String     | Alternate phone number.
| mobile          | String     | Mobile phone number.
| fax             | String     | Fax phone number.
| primaryEmailAddr| String     | Primary email address.
| webAddr         | String     | Website address.
| termRefId       | String     | The ID for the referenced object as found in the Id field of the object payload.
| termRefName     | String     | An identifying name for the object being referenced by termRefId
| taxable         | Boolean    | If true, transactions for this customer are taxable.
| billAddr        | JSON       | Bill-to address of the Invoice. 
| otherContactInfo| JSON       | List of ContactInfo entities of any contact info type.
| acctNum         | String     | Name or number of the account associated with this vendor.
| vendor1099      | Boolean    | This vendor is an independent contractor; someone who is given a 1099-MISC form at the end of the year. A 1099 vendor is paid with regular checks, and taxes are not withheld on their behalf.
| currencyRefId   | String     | A three letter string representing the ISO 4217 code for the currency. 
| currencyRefName | String     | An identifying name for the currency being referenced by currencyRefId

## QuickBooksAccounting.queryVendor
Returns the results of the query.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Api key obtained from Intuit
| apiSecret  | credentials| Api secret obtained from Intuit
| accessToken| String     | Access token provided by user
| tokenSecret| String     | Token secret provided by user
| companyId  | Number     | Id of the company
| query      | String     | Your query to process

