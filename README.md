# Welcome to Joomla! Extension For YOYOW Blockchain

## Component installation/configuration
### Installation
1. Login as administrator (Admin panel)
2. Go to `Extensions` &rightarrow; `Manage` &rightarrow; `install`
3. In the `Upload Package File` tab. Drag or choose the zip component file.


### Configuration
1. Login as administrator (Admin panel)
2. Go to `Modules`
3. Seach &rightarrow; `yoyow`
4. Open module configuration and set the parameters:
- `Required YOYOW Sign Up` If all users who are registered in the Joomla! platform have to be synchronized with a yoyow account to navigate in, check it.
- `MiddleWare Url` Your middleware location (I.E. localhost:3000 or http://172.18.0.1:3001)
- `YOYOW Id` Your YOYOW Id (I.E. 27775948)
- `Url redirect` After users validate their account on yoyow platform, where they should be redirect? (I.E. http://myPage.es)

### Module position
1. Login as administrator (Admin panel)
2. Go to `Modules`
3. Seach &rightarrow; `yoyow`
4. Open module configuration and in the right sidebar we have all the position configuration like:
- `Position` let you put it in somewhere.
- `Access` we recomend to put it as "registered" because unregistered users can't log in on yoyow's platform.

Otherwise if you just want to create a new yoyow's login menu, goto: 
1. `Menus` &rightarrow; `Manage` &rightarrow; select the menu where yoyow login is going to be.
2. `new`
3. The menu item type has to be `Yoyow` &rightarrow; `User Login - Yoyow`

## Joomla Extension Roadmap
YOYOW is a blockchain based content value network, its main goal is to establish a rational content income distribution mechanism to provide token incentives to content creators, website owners, content curators and consumers.
This extension is developed based on the middleware of YOYOW blockchain to enable joomla websites to interact with YOYOW blockchain.

For more info, visit: https://yoyow.org/en.html
### This extension doesn’t provide token incentives at the moment, the token incentive feature is expected to go live on the 2nd quarter of 2019

## The extension has completed the following features:
1.	User login using identity from YOYOW blockchain

## The version 2.0 (1st  quarter of 2019) of the extension will complete the following features:
1.	Post articles or hash values to the blockchain for blockchain content storage, witness and copyright protection
2.	QR Code login feature
3.	Direct token transfer to send token reward to content creators

## The version 3.0 (2nd quarter of 2019) of the extension will complete the following features:
1.	Token incentive feature
