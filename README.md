# Project 4
+ By: Frank Pizzuta
+ Production URL: <http://p4.pizzuta.com>

## Database

Primary tables:
  + `games`
  + `players`
  + `records`
  
Pivot table(s):
  + `Records`


## CRUD

__Create__
  + Visit <http://p4.pizzuta.com/newgame>
  + Fill out form
  + Click *Create*
  *Observe confirmation message*
  
__Read__
  + Visit <http://p4.pizzuta.com/games> see a listing of all games played
  
__Update__
  + Visit <http://p4.pizzuta.com/games/3>; click Edit next to the scoring table
  + Make some edit to form
  + Click *Save*
  + You are returned to original screen and can see changes
  
__Delete__
  + Visit <http://p4.pizzuta.com/games/3>; click Delete next to the scoring table
  + Confirm deletion
  + Observe game is no longer shown in main list

## Outside resources
+ <https://giphy.com/gifs/airplane-i-am-serious-surely-you-cant-be-3oEjHLzm4BCF8zfPy0/embed>
+ <https://laracasts.com/discuss/channels/laravel/how-to-add-a-new-element-to-every-item-of-collection?page=1>
+ <https://fontawesome.com/how-to-use/on-the-web/setup/getting-started>

## Code style divergences
+ There is an html validation warning around using input type of date. This is fine in chrome and decided to ignore moving to polyfill.

## Notes for instructor
+ I had a heck of a time with relationships. I wamted my primary key in Records to be the foreign key for Recordplayers. Turns out you cant be both in eloquent. I am happy that i figure out a way around it but i wonder if i missed out on how relationships could help.
+ I have no idea why i named the one table and object recordplayers instead of playerrecords. By the time i realized it i was too far in to it and was afraid of breaking everything if i tried to refactor. 
+ I really want to do authentication but i just dont have enough time. Taking two classes while working full time was insane. My login screen is still there but i just bypassed it for now.
