<!doctype html>

<!-- our layout file can be used by all our views. We can use the ATyield directive to define a section where the content of the child view can be injected. We can also use the ATsection directive to define a section that can be injected into the layout file. -->

<title>My Blog</title>

<link rel="stylesheet" href="/app.css">

<body> 
    <!-- ATyield('some name') allow us to define a section that can be injected into views that extend the layout file. In the view, we would use the ATsection directive to define the content of the section, using the same name in both files    -->

    @yield('content')

</body>