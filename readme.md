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


# How It *(currently)* Works
This project extends the ```League/Fractal``` in order to more tightly integrate with Ember. The main benefit of Ember is the framework relies on Convention vs Configuration so assumptions can be made. Here is how the api is built currently. I tried to separate as much as possible into the ```Library\Emberify``` directory.  

## Transformers

First I created a Transformer for each Model. You can pretty much follow the [docs](http://fractal.thephpleague.com/transformers/) here. The real difference is that ember data only needs the ids of the related models. So if you include the ``Library\Emberify\Autoincludable`` trait, you will gain access to the ``addIncludes()`` function. Fractal currently makes you create an includeWhatever() method for each related model, but I found this unecessary since we always want the same thing. Therefore,  just add your $defaultIncludes and then run ``addIncludes()`` after you define your model.  Here is an example for a BookTransformer:

```php
class BookTransformer extends TransformerAbstract {
    use AutoIncludeable;

    protected $defaultIncludes = [
        'categories', 'authors'
    ];
    public function transform(\Book $book)
    {
        $pattern = [
            'id' => (int) $book->id,
            'title' => $book->title
        ];

        $pattern = $this->addIncludes($pattern, $book);

        return $pattern;
    }
}
```

## Emberifiable

This is a matter of taste, but typically I keep most of my Domain level logic in its own directory, and a lot of the buisiness logic inside different repositories. You don't have to and this will work just fine if you do this within your Model, but I have found that as the code base grows, the Model gets a bit bloated. Here is how I do it

### 1. Add the Emberfiable trait

You can either add ``Library\Emberify\Emberfiable`` to the Model's Repo or the Model itself. Regardless, just be sure that you have defined the ```$transformer``` in the constructor like so: 

```php
class UserRepository implements RepositoryInterface{
    use Emberifiable;


    /**
     * @var \User
     */
    private $user;
    /**
     * @var UserTransformer
     */
    private $transformer;

    function __construct(\User $user, UserTransformer $transformer)
    {
        $this->user = $user;
        $this->transformer = $transformer;
    }
```

### 2. Emberify()

Now that you have done this, you now have access to the emberify() method. Simply pass whatever you want to emberify to that method and return it for ember-data safe info. Heres how I use it for showing retrieving a particular Category:

```php 
public function show($id)
	{
		$category = $this->categoryRepository->find($id);
		return $this->categoryRepository->emberify($category);
	}
	
```

Its as easy as that.

# Future Plans
I plan to break off the Emberify Directory into its own separate package. 





## Support & Contributing
This is a learning exercise for me that I plan to share to anyone having trouble hooking up Laravel and Ember. That being said, any contributions would be greatly appreciated. Feel free to submit pull requests or open up a ticket. 