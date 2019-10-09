{capture 'test_example_content'}
    {component 'admin:pagination' total=10 current=3 url='/'}
    {component 'admin:pagination' total=10 current=4 url='/'}
    {component 'admin:pagination' total=10 current=5 url='/'}
    {component 'admin:pagination' total=10 current=7 url='/'}
    {component 'admin:pagination' total=10 current=9 url='/'}
    {component 'admin:pagination' total=10 current=10 url='/'}
    <br>
    {component 'admin:pagination' total=1 current=1 url='/'}
    <br>
    {component 'admin:pagination' total=3 current=1 url='/'}
    {component 'admin:pagination' total=3 current=2 url='/'}
    {component 'admin:pagination' total=3 current=3 url='/'}
    <br>
    {component 'admin:pagination' total=5 current=3 url='/'}
    {component 'admin:pagination' total=5 current=1 url='/'}
    {component 'admin:pagination' total=5 current=5 url='/'}
    <br>
    {component 'admin:pagination' total=6 current=5 url='/'}
    {component 'admin:pagination' total=6 current=2 url='/'}
    {component 'admin:pagination' total=6 current=1 url='/'}
    {component 'admin:pagination' total=6 current=6 url='/'}
    {component 'admin:pagination' total=6 current=3 url='/'}
    {component 'admin:pagination' total=6 current=4 url='/'}
{/capture}

{test_example content=$smarty.capture.test_example_content}