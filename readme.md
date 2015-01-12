# Larember (Ebervel?)

## Purpose
This is an exercise to demonstrate best practices in using the latest version of Ember with a Laravel backend. I have had several projects that have had this set up, but all have had their pitfalls and were in their own way less than perfect. 

## Overview
> **Disclaimer** I know this is going to sound simple and the example may be overused, but I wanted to focus on the technique rather than the content. I also could not stomach another todo type example.

Let's pretend you have a library that has many books written by one or more authors. These books may belong to one or more categories. To make things simple, there will only be one copy of each book. A member chan check out one or more books. 

## Requirements & Objectives

- The front end will be completely written in Ember. (1.10)
- The front end will interact with the backend using a RESTful API
- This API will use an implementation of [PHP League's Fractal](http://fractal.thephpleague.com/)
- The goal is to return ember-data friendly JSON with a simple:

```php
// BookController.php
public function show($id)
{
    $book = Book::find($id);
    return $bookRepo->emberify($book);
}

```

would return

```json
{
    "book":
    {
        "id": 1
        "title": "Rework",
        "authors" : [1,2],
        "categories" : [7]
    }
}
```
- we will assume that each model will have a serializer that will implement EmberSerializer and a transformer based on each model.

## Support & Contributing
This is a learning exercise for me that I plan to share to anyone having trouble hooking up Laravel and Ember. That being said, any contributions would be greatly appreciated. Feel free to submit pull requests or open up a ticket. 