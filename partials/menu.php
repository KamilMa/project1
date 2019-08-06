

<section class="pmenu-content">
        <div class="ui container">
            <div class="space20"></div>
            <h1 class="ui horizontal divider header">
                <i class="icon noodles"></i>
            </h1>
            <div class="ui grid">
                <div class="row">
                    <div class="two wide column"></div>
                    <div class="two wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">STARTERY</h2>
                        <div class="ui list startery">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('startery')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                    <div class="one wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">ZUPY</h2>
                        <div class="ui list zupy">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('zupy')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                </div>

                <div class="space20"></div>

                <div class="row">
                    <div class="two wide column"></div>
                    <div class="two wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">DANIA GŁÓWNE</h2>
                        <div class="ui list glowne">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('glowne')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                    <div class="one wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">SAŁATKI</h2>
                        <div class="ui list salatki">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('salatki')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                </div>

                <div class="space20"></div>

                <div class="row">
                    <div class="two wide column"></div>
                    <div class="two wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">MAKARON I RYŻ</h2>
                        <div class="ui list makarony">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('makarony')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                    <div class="one wide column"></div>
                    <div class="five wide column">
                        <h2 class="pmenu-h2">NAPOJE</h2>
                        <div class="ui list napoje">

                        <span class="add-menu-span">Dodaj nową pozycję<a class="add-menu" onClick="addMenu('napoje')"><i class="plus icon"></i></a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="space40"></div>

    <!--=========== Modal menu edit ==========-->
<div class="ui modal" id="modall">
  <i class="close icon"></i>
  <div class="header">
    Edytuj menu
  </div>
    <div class="content">
        <form class="ui form" id="form-edit-menu" action="" method="post">
            <div class="field">
                 <label>Nazwa dania</label>
                 <input type="text" name="name-dish" id="name-dish" value="">
                 <label>Cena</label>
                 <input type="text" name="price-dish" id="price-dish" value="">
                 <div class="space20"></div>
                 <label>Opis</label>
                 <input type="text" name="description-dish" id="description-dish" value="">
            </div>
            <input type="hidden" name="type" id="type-form" value="">
            <input type="hidden" name="id-dish" id="id-dish" value="">
            <input type="hidden" name="type-dish" id="type-dish" value="">
            <button type="submit" class="ui positive button" id="editMenu"> Zapisz zmiany !</button>
        </form>
    </div>
</div>
<!--=========== /Modal menu edit ==========-->
