[![](https://scdn.rapidapi.com/RapidAPI_banner.png)](https://rapidapi.com/package/QuickBooksAccounting/functions?utm_source=RapidAPIGitHub_QuickBooksAccountingFunctions&utm_medium=button&utm_content=RapidAPI_GitHub)

# QuickBooksAccounting Package
QuickBooksAccounting
* Domain: https://developer.intuit.com
* Credentials: apiKey, apiSecret

## How to get credentials: 
0. Item one 
1. Item two 

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
Updates a bill that has been previously created.

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
| syncToken  | String     | syncToken of the bill

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
Updates existing bill payment by check

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
Updates existing bill payment by credit card

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
| syncToken    | String     | syncToken of the bill

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
| syncToken   | String     | syncToken of the bill

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
| syncToken  | String     | syncToken of the bill

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
| syncToken  | String     | syncToken of the bill

