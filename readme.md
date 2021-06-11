##Introduce CZ
- Třída NotificationManager je funkční ale špatně napsaný a zastaralý kód. 
	- Její funkcí je zajistit odeslání zprávy na zařízení jednoho uživatele nebo na všechna zařízení uložená v DB (více než 500K).
- Práci s databází zajištuje ORM Elloquent (https://laravel.com/docs/master/eloquent).
- Základem třídy jsou její vlastnosti $client a $countryCode. 
	- $client je instance třídy Client. Třída Client implementuje interface s jedinou metodou `send($payload)`, která odesílá zprávu.
	- $countryCode je string s kódem země na kterou se rozesílka vztahuje.

- Váš úkol: 
	- Proveďte refactoring této třídy, tak aby splňovala obecné zásady programování.
	- Využijte přednosti posledních verzí PHP a běžně použávaných standartů.
	- Funkcionalita třídy by měla zůstat stejná.

##Introduce ENG
- The NotificationManager class is a functional but bad written and legacy code what could be written more effective. 
	- Its function is to send a message to a single user's device or to all devices stored in the DB (more than 500K).
- Work with the database is provided by ORM Elloquent (https://laravel.com/docs/master/eloquent).
- Base attributes of the class are $client a $countryCode. 
	- $client is instance of the class Client. Client class implements the interface with only one method `send($payload)`, for send the message.
	- $countryCode is string with iso code of the country what is related to notification.

- Your task: 
	- Do the refactor of this class to conform to the general programming principles.
	- With using latest PHP features and commonly used standarts.
	- The functionality of the class should remain the same.
	
