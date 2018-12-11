# Installation

1. Login as administrator (Admin panel)
2. Go to `Extensions` &rightarrow; `Manage` &rightarrow; `install`
3. In the `Upload Package File` tab. Drag or choose the zip component file.


# Configuration

1. Login as administrator (Admin panel)
2. Go to `Modules`
3. Seach &rightarrow; `yoyow`
4. Open module configuration and set the parameters:
- `Enable QR` If it is checked, the QR code button is going to be shown on the module.
- `Required Yoyow Sign Up` If all users who are registered in the joomla! platform have to be synchronized with a yoyow account to navigate in, check it.
- `MiddleWare Url` Your middleware location (I.E. localhost:3000 or http://172.18.0.1:3001)
- `Yoyow Id` Your Yoyow Id (I.E. 27775948)
- `Url redirect` After users validate their account on yoyow platform, where they should be redirect? (I.E. http://myPage.es)

# Module position
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

