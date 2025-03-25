[![Latest Stable Version](https://poser.okvpn.org/julio101290/boilerplatecomplementopago/v/stable)](https://packagist.org/packages/julio101290/boilerplatecomplementopago) [![Total Downloads](https://poser.okvpn.org/julio101290/boilerplatecomplementopago/downloads)](https://packagist.org/packages/julio101290/boilerplatecomplementopago) [![Latest Unstable Version](https://poser.okvpn.org/julio101290/boilerplatecomplementopago/v/unstable)](https://packagist.org/packages/julio101290/boilerplatecomplementopago) [![License](https://poser.okvpn.org/julio101290/boilerplatecomplementopago/license)](https://packagist.org/packages/julio101290/boilerplatecomplementopago)

![image](https://github.com/user-attachments/assets/3aa98f16-c7e2-460c-8fda-f538cdb34aab)



## CodeIgniter 4 Boilerplate Carta Porte
library to generate carta porte complement CFDI 4.0

## CodeIgniter 4 What is Carta Porte
The "Carta Porte" is a digital fiscal document used in Mexico to support the transportation of goods and merchandise within the national territory. Its main function is to accredit the legal possession of the merchandise during its transport, as well as to provide detailed information about its origin and destination.

Here are some key points about the Carta Porte:

Digital fiscal document: It is an electronic tax receipt (CFDI) to which the Carta Porte complement is incorporated.
Supports the transport of goods: It accredits the legal stay and/or possession of goods or merchandise during their transport within the national territory.
Identifies the origin and destination: It provides detailed information about the place from which the goods originate and where they are going.
Combats smuggling: It helps to prevent smuggling and unfair competition among transport companies.
Facilitates traceability: It allows tracking the merchandise throughout its journey.
Transport contract: It functions as a legal contract between the sender, the carrier, and the recipient, establishing the terms and conditions of transport.
In summary, the Carta Porte is an essential document for the transport of goods in Mexico, as it guarantees the legality, security, and traceability of goods during their transport.


## Requirements
* PhpCfdi\SatCatalogos
* julio101290/boilerplatelog
* hermawan/codeigniter4-datatables

## Installation

### Run commands
	
 	composer require phpcfdi/sat-catalogos

   	composer require hermawan/codeigniter4-datatables

    	composer require julio101290/boilerplatelog

	composer require julio101290/boilerplatecompanies

  	composer require julio101290/boilerplatestorages

	composer require julio101290/boilerplatecartaporte

	


### Run command for migration and seeder

	php spark boilerplatecompanies:installcompaniescrud

 	php spark boilerplatelog:installlog

  	php spark boilerplatestorages:installstorages

	php spark boilerplatecartaporte:installcartaporte
	

# Make the Menu, Example
![image](https://github.com/user-attachments/assets/bc6be922-f4a3-4f27-b146-c63b436e9c4a)


# Ready

![image](https://github.com/user-attachments/assets/967b0b8c-6ba3-4509-b334-47431ea061f7)
![image](https://github.com/user-attachments/assets/e63399f6-acc1-4fca-8ba9-850cb6b0bcf0)



Usage
-----
You can find how it works with the read code routes, controller and views etc. Finnally... Happy Coding!

Changelog
--------
Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

Contributing
------------
Contributions are very welcome.

License
-------

This package is free software distributed under the terms of the [MIT license](LICENSE.md).
