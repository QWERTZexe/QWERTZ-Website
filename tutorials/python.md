# Python Tutorial

## Chapter One: Requirements

In order to code python you need an interpreter. You can download the official one at [python.org](https://www.python.org/). 
It has an integrated IDE though I recommend using Visual Studio Code. [Download VSCode](https://code.visualstudio.com/)

## Chapter Two: The Basics

Python files are .py files. Start with creating one.
Open the file in Visual Studio Code / any other IDE you are using.

## Chapter Three: Pythons Syntax and Print

Pythons syntax is very simple.
Strings are in " "
Arguments are in ()
Let's start with your first command. It's called print.
Print simply visualizes the given arguments in the console
for example:
```py
print("HELLO WORLD!")
```
Output:
```py
HELLO WORLD!
```
You just made a working program!

## Chapter Four: Variables

Variables are like placeholders, they can store any value. For example a string. Variables get defined with "=". In this small example we set the value of the variable 'myvar' to "Hi!"
```py
myvar = "Hi!"
```
To make use of our variable we will simply print it:
```py
myvar = "Hi!"
print(myvar)
```
Output:
```py
Hi!
```

## Chapter Five: Input

But what if we want to let the user decide what to get printed? Thats what input is for! input asks the user to give a string. The syntax is as follows:
```py
input("text to display")
```
to save the answer in a variable use the variable syntax from chapter four:
```py
myvar = input("text to display")
```
Lets print the users input:
```py
myvar = input("What is your input?")
print(myvar)
```

## Chapter Six: Conditions
Conditions are essential in programming. For example, you only want the code to continue if the user says yes. Lets start with the easiest condition: only do if a variable is "yes":
First, we need the user to set the variable. This is done with chapter fives input:
```py
userinput = input("Do you want to continue?")
```
Now our condition starts: We will use an IF statement: If they are the same then... Note that you need a : at the end of a condition. On "if-its-the-same" conditions you use two == instead of one. You dont need to understand that. = means set the first value to the second value. == compares two values.
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
```
Now we want our program to print "ok, you said yes!". Everything you want to do inside of the condition is indented into the condition. In our example it would be:
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
  print("ok, you said yes!")
```

## Chapter Seven: If Elif Else
But what if the user didnt say yes? Thats why we have else:
Else action executes if the condition in the if statement is NOT true. As it always executes depending on the if action it doesnt need any arguments / condition:
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
  print("ok, you said yes!")
else:
  print("you didnt say yes!")
```
A more complicated version is 'elif', the short form for "else-if" It is like an else: it only triggers if the condition in the if statement is NOT true. BUT it also has a condition:
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
  print("ok, you said yes!")
elif userinput == "no":
  print("you said no!")
```
It just saves a lot of time and space. Instead of using
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
  print("ok, you said yes!")
else:
  if userinput == "no":
    print("you said no!")
```

## Chapter Eight: Combining If Elif Else
Lets make it more complex. It will check for "yes", "no" AND for unknown answers. We will check if the answer is yes, if it isnt we will check if the answer is no, if it isnt either we will say its an unknown answer.
```py
userinput = input("Do you want to continue?")
if userinput == "yes":
  print("ok, you said yes!")
elif userinput == "no":
  print("you said no!")
else:
  print("Unknown answer!")
```

## Chapter Nine: Integers and float
But what if we wanted to make a calculator? Strings are very useless there. So we will learn a new type: integers! integers are whole numbers. For example 1 and 5 are an integer while 1.1 and 2.63 arent.
Lets set a variable to an integer:
```py
integervar = 1
```
To sum an integer with another one, you will use "+". Other operations are "-","//","*" and "%".
```py
integervar = 1
var2 = 5
result = integervar + var2
print(result)
```
Output:
```py
6
```
Lets ask the user for two numbers and sum them.
```py
var1 = input("Number 1?")
var2 = input("Number 2?")
result = int(var1) + int(var2)
print(result)
```
Here you can see, there is an "int" function in the sum function. You will learn more about this in chapter ten. But what is a float? A float is a decimal number! For example 1.134 1.1 5.0 and so on. We cant do maths with a float and an integer. Both have to be the same type.

## Chapter Ten: Convert between types
But sometimes you want to do math with strings, divide an integer by a float and so on. Luckily, we can convert between types. Some of them you already know are 'string', 'integer' and 'float'. There are many more. You will learn more about the 'list' type in chapter 11.
In order to convert between types, you need to know the short names of the types. The most important ones are: String = 'str' Integer = 'int' Float = 'float' List = 'list' and Dictionary = 'dict'
Now lets start by converting a string into a float to perform math with it
```py
stringobject = input("Number please")
floatobject = float(stringobject) # here the magic happens
result = floatobject*10.5
print(result)
```
Output if we input "5"
```py
52.5
```
Note: not every convertion works. For example, you cant convert the string "hi10" to an integer / float

## Chapter Eleven: Lists part 1
Lists are - as the name says, lists. Lists are in [ ]. They are stored in a normal variable and have the "list" type. Lets define our first list:
```py
mylist = []
```
A list can hold objects of the types string, integer, float, list (a list of lists (2d list, 3d list and so on)), dictionary and many more. Lets insert a string, an integer and a float to it
```py
mylist = ["string",4,71.3]
```

## Chapter Twelve: Indices
Indices are very important. With indices, you can get a specific character of a string or a specific element of a list. Indices start at zero. Means: if we have the string "Hello!", then index 0 would be "H" and index 1 would be "e". You will get used to that soon. Now to the syntax. You append [INDEX] to the end of the variable name to get INDEX:
```py
string = "Hello!"
print(string[4])
```
Output:
```py
o
```
Get the element of a list:
```py
mylist = ["coding","community","on","top","!"]
firstelement = mylist[1]
print(firstelement)
```
Output:
```py
coding
```
Get the value from a 2d list:
```py
mylist = [["this","is","a","2d","list"],["coding","community","on","top","!"]]
listone = mylist[0]
firstelement = mylist[1][2]
print(listone)
print(firstelement)
```
Output:
```py
['this', 'is', 'a', '2d', 'list']
on
```
Thats all you need to know about indices!

## Chapter Thirteen: Lists part 2
We now have our list:
```py
mylist = ["string",4,71.3]
```
Now we want to remove the last value: thats why we have .pop(INDEX)
our list is 3 elements long, we want to remove the third element. indexes start at 0. so the index is 2:
```py
mylist = ["string",4,71.3]
print(mylist)
mylist.pop(2)
print(mylist)
```
Output:
```py
['string', 4, 71.3]
['string', 4]
```
Now we want to append an element to our list: .append("hi!")
```py
mylist = ["string",4,71.3]
print(mylist)
mylist.pop(2)
print(mylist)
mylist.append("hi!")
print(mylist)
```
Output:
```py
['string', 4, 71.3]
['string', 4]
['string', 4, 'hi!']
```
Using .insert you can insert an element at a specific index:
```py
mylist = ["string",4,71.3]
print(mylist)
mylist.pop(2)
print(mylist)
mylist.insert(0,"hi!")
print(mylist)
```
Output:
```py
['string', 4, 71.3]
['string', 4]
['hi!', 'string', 4]
```
## Chapter Fourteen: Errors
But what if our program isnt working? In this chapter, we will have a look at some basic errors and two methods to debug them. Some basic errors: 

**NameError**
```py
print(variable)
# NameError: name 'variable' is not defined
```
This means you are trying to access a variable (in this case in a print statement) which hasnt been set yet. This can be fixed by setting the variable
```py
variable = "hello"
print(variable)
# hello
```

**TypeError**
```py
number = "10"
result = number + 5
# TypeError: can only concatenate str (not "int") to str
```
In this case we want to sum up number with 5. Note that number is a string. You cant sum an integer with a string. This can be fixed by converting the number (which is a string right now) into an integer:
```py
number = "10"
result = int(number) + 5
```

**IndexError**
```py
mylist = [1,2,3]
mylist[4]
# IndexError: list index out of range
```
This means: You are trying to get the fifth element of the list but its only 3 elements long.

To debug errors:
### Print Debugging
Pretty straightforward, put print statements in the line before the error, for example:
```py
mylist = [1,2,3]
print(len(mylist)-1) # This prints the maximum index you can query
mylist[4]
```
### Undo-ing
Undo your last steps (Usually Ctrl + Z) and try to understand how your recent change modified the code