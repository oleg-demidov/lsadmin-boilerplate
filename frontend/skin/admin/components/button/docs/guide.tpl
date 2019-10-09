{**
 * Кнопки
 *}
{test_heading text='Кнопки'}

{capture 'test_example_content'}
    {component 'admin:button' text='Кнопка'}
    {component 'admin:button' text='Ссылка' url='http://example.com'}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Кнопка'{rdelim}
{ldelim}component 'button' text='Ссылка' url='http://example.com'{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}


{**
 * Цвета
 *}
{test_heading text='Цвета'}

<p>Модификаторы <code>primary</code> <code>success</code> <code>info</code> <code>warning</code> <code>danger</code></p>

{capture 'test_example_content'}
    {component 'admin:button' text='Default'}
    {component 'admin:button' text='Primary' mods='primary'}
    {component 'admin:button' text='Success' mods='success'}
    {component 'admin:button' text='Info' mods='info'}
    {component 'admin:button' text='Warning' mods='warning'}
    {component 'admin:button' text='Danger' mods='danger'}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Default'{rdelim}
{ldelim}component 'button' text='Primary' mods='primary'{rdelim}
{ldelim}component 'button' text='Success' mods='success'{rdelim}
{ldelim}component 'button' text='Info' mods='info'{rdelim}
{ldelim}component 'button' text='Warning' mods='warning'{rdelim}
{ldelim}component 'button' text='Danger' mods='danger'{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}


{**
 * Размеры
 *}
{test_heading text='Размеры'}

<p>Модификаторы <code>large</code> <code>small</code> <code>xsmall</code></p>

{capture 'test_example_content'}
    <p>{component 'admin:button' text='Large button' mods='large'}</p>
    <p>{component 'admin:button' text='Default button' mods='default'}</p>
    <p>{component 'admin:button' text='Small button' mods='small'}</p>
    <p>{component 'admin:button' text='Xsmall button' mods='xsmall'}</p>
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Large button' mods='large'{rdelim}
{ldelim}component 'button' text='Default button' mods='default'{rdelim}
{ldelim}component 'button' text='Small button' mods='small'{rdelim}
{ldelim}component 'button' text='Extra small button' mods='xsmall'{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}

<h3>Кнопка во всю ширину родительского блока</h3>

<p>Модификатор <code>block</code></p>

{capture 'test_example_content'}
<div style="background: #fafafa; padding: 20px; width: 200px;">
    {component 'admin:button' text='Block button' mods='large block'}
</div>
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Large button' mods='large block'{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}


{**
 * Иконки
 *}
{test_heading text='Иконки'}

<p>Параметр <code>icon</code></p>

{capture 'test_example_content'}
    <p>{component 'admin:button' text='Save' icon='check'}</p>
    {component 'admin:button' mods='icon' icon='check'}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Save' icon='check'{rdelim}
{ldelim}component 'button' icon='check' mods='icon'{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}


{**
 * Отправка формы
 *}
{test_heading text='Отправка формы'}

<p>Опция <code>form</code> позволяет указать id формы для отправки, это бывает полезно если кнопку отправки необходимо разместить вне формы.</p>

{capture 'test_code'}
<form id="myform">
    ...
</form>

{ldelim}component 'button' text='Отправить' form='myform'{rdelim}
{/capture}

{test_code code=$smarty.capture.test_code}


{**
 * Группировка кнопок
 *}
{test_heading text='Группировка кнопок'}

<p>Шаблон <code>group</code> позволяет группировать кнопки. По умолчанию кнопки группируются горизонтально, для вертикальной группировки необходимо добавить мод-ор <code>vertical</code>.</p>

{capture 'test_example_content'}
    {component 'admin:button' template='group' buttons=[
        [ 'text' => 'Left' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Right' ]
    ]}
    <br>
    {component 'admin:button' template='group' buttons=[
        [ 'text' => 'Left', 'mods' => 'large' ],
        [ 'text' => 'Middle', 'mods' => 'large' ],
        [ 'text' => 'Middle', 'mods' => 'large' ],
        [ 'text' => 'Middle', 'mods' => 'large' ],
        [ 'text' => 'Right', 'mods' => 'large' ]
    ]}
    <br>
    {component 'admin:button' template='group' buttons=[
        [ 'text' => 'Middle' ]
    ]}
    <br>
    {component 'admin:button' template='group' mods='vertical' buttons=[
        [ 'text' => 'Left' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Right' ]
    ]}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' template='group' buttons=[
    [ 'text' => 'Left' ],
    [ 'text' => 'Middle' ],
    [ 'text' => 'Middle' ],
    [ 'text' => 'Middle' ],
    [ 'text' => 'Right' ]
]{rdelim}

{ldelim}component 'button' template='group' buttons=[
    [ 'text' => 'Left', 'mods' => 'large' ],
    [ 'text' => 'Middle', 'mods' => 'large' ],
    [ 'text' => 'Middle', 'mods' => 'large' ],
    [ 'text' => 'Middle', 'mods' => 'large' ],
    [ 'text' => 'Right', 'mods' => 'large' ]
]{rdelim}

{ldelim}component 'button' template='group' buttons=[
    [ 'text' => 'Middle' ]
]{rdelim}

{ldelim}component 'button' template='group' mods='vertical' buttons=[ ... ]{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}

<h3>Общие параметры кнопок</h3>

<p>Для всех кнопок в группе можно указать общие параметры в параметре <code>buttonParams</code>, например код:</p>

{capture 'test_code'}
{ldelim}component 'button' template='group' buttons=[
    [ 'text' => 'Left', 'mods' => 'large' ],
    [ 'text' => 'Middle', 'mods' => 'large' ],
    [ 'text' => 'Right', 'mods' => 'large' ]
]{rdelim}
{/capture}

{test_code code=$smarty.capture.test_code}

<p>Можно переписать как:</p>

{capture 'test_code'}
{ldelim}component 'button'
    template='group'
    buttonParams=[ 'mods' => 'large' ]
    buttons=[
        [ 'text' => 'Left' ],
        [ 'text' => 'Middle' ],
        [ 'text' => 'Right' ]
    ]{rdelim}
{/capture}

{test_code code=$smarty.capture.test_code}

<p>Таким образом модификтор <code>large</code> применится ко все кнопкам в группе.</p>


{**
 * Тулбар
 *}
{test_heading text='Тулбар'}

<p>Для отображения нескольких групп кнопок используется шаблон <code>toolbar</code> и параметр <code>groups</code>, который принимает массив с группами кнопок.</p>

{capture 'test_example_content'}
    {component 'admin:button' template='toolbar' groups=[
        [
            'buttons' => [
                [ 'icon' => 'check' ],
                [ 'icon' => 'remove' ],
                [ 'icon' => 'search-plus' ],
                [ 'icon' => 'search-minus' ]
            ]
        ],
        [
            'buttons' => [
                [ 'text' => '1' ],
                [ 'text' => '2' ],
                [ 'text' => '3' ],
                [ 'text' => '4' ]
            ]
        ],
        [
            'buttons' => [
                [ 'text' => '1' ]
            ]
        ]
    ]}
    <br>
    {component 'admin:button' template='toolbar' mods='vertical' groups=[
        [
            'buttons' => [
                [ 'icon' => 'check' ],
                [ 'icon' => 'remove' ],
                [ 'icon' => 'search-plus' ],
                [ 'icon' => 'search-minus' ]
            ]
        ],
        [
            'buttons' => [
                [ 'text' => '1' ],
                [ 'text' => '2' ],
                [ 'text' => '3' ],
                [ 'text' => '4' ]
            ]
        ],
        [
            'buttons' => [
                [ 'text' => '1' ]
            ]
        ]
    ]}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' template='toolbar' groups=[
    [
        'buttons' => [
            [ 'icon' => 'check' ],
            [ 'icon' => 'remove' ],
            [ 'icon' => 'search-plus' ],
            [ 'icon' => 'search-minus' ]
        ]
    ],
    [
        'buttons' => [
            [ 'text' => '1' ],
            [ 'text' => '2' ],
            [ 'text' => '3' ],
            [ 'text' => '4' ]
        ]
    ],
    [
        'buttons' => [
            [ 'text' => '1' ]
        ]
    ]
]{rdelim}
{ldelim}component 'button' template='toolbar' mods='vertical' groups=[ ... ]{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}


{**
 * Счетчик
 *}
{test_heading text='Счетчик'}

{capture 'test_example_content'}
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ]} <br><br>
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ] mods='primary'} <br><br>
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ] mods='success'} <br><br>
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ] mods='info'} <br><br>
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ] mods='warning'} <br><br>
    {component 'admin:button' text='Комментарии' icon='comments' badge=[ value => 10 ] mods='danger'}
{/capture}

{capture 'test_example_code'}
{ldelim}component 'button' text='Комментарии' icon='comments' badge=[ value => 10 ]{rdelim}
{/capture}

{test_example content=$smarty.capture.test_example_content code=$smarty.capture.test_example_code}