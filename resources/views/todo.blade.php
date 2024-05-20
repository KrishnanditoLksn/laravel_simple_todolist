<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="flex flex-col items-center">
    <h1 class="text-xl text-center">Todolist Orang Aneh</h1>
    <div>
        <form action="add-data" method="post">
            @csrf
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Todo
                Name</label>
            <input type="text" id="name" aria-describedby="helper-text-explanation" name="name"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-5">
            <input type="submit" class="btn btn-primary float-end">
        </form>
    </div>
</div>
<div class="flex flex-col items-center mt-44">
    <div class="">
        <ul class="list-decimal text-gray-900 max- max-w-md space-y-1 list-inside">
            <!--Loop through all todos-->
            @foreach($todos as $todo)
                <li class="">
                    {{$todo->todo_name}}||
                    <a class="text-red-800" href="/delete/{{$todo->id}}">
                        Delete |
                    </a>
                    {{$todo->todo_status}}
                    <a class="text-green-900" href="/update/{{$todo->id}}">
                        Update Status
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
</body>
</html>
