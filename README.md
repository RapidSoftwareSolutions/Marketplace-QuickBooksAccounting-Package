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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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

## QuickBooksAccounting.createBillCheckPayment
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

## QuickBooksAccounting.createBillCreditCardPayment
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
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| bankAccountRefId       | String     | The ID for the referenced object as found in the Id field of the object payload.
| bankAccountRefName     | String     | An identifying name for the object being referenced by bankAccountRefId
| printStatus            | String     | Printing status of the invoice. Valid values: NotSet, NeedToPrint, PrintComplete.
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| billpaymentId          | Number     | Id of the billpayment
| billpaymentLines       | Array      | Individual line items of a transaction.
| totalAmt               | String     | Indicates the total amount of the associated with this payment.
| vendorRefId            | String     | The ID for the referenced object as found in the Id field of the object payload.
| vendorRefName          | String     | An identifying name for the object being referenced by vendorRefId
| ccAccountRefId         | String     | The ID for the referenced object as found in the Id field of the object payload.
| ccAccountRefName       | String     | An identifying name for the object being referenced by bankAccountRefId
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| estimateID | String     | Id of the estimate
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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
| metadataCreateTime     | String     | Time the entity was created in the source domain.
| metadataUpdateTime     | String     | Time the entity was last updated in the source domain.
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

