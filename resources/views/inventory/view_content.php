<div class="container" ng-app="inventoryApp" ng-cloak>
    <div class="center">
        <img src="img/medical/svg/tablets.svg" alt="inventory" width="10%">
    </div>

    <div class="banner shadow-1" style="margin-top: 50px;">
        <h2>
            <a class="red-text" href="/"><i class="fa fa-home"></i> Home</a>
            <i class="fa fa-angle-right"></i>
            <span>Inventory</span>
        </h2>
    </div>

    <hr class="divider-icon">

    <div class="row" ng-controller="mainCtrl">
        <div class="col-sm-12">
            <div class="card-large card-default card-body">

                <h3 class="left"><a href="" class="clickable"><i class="fa fa-search"></i></a> INVENTORY
                    [{{inventories.length}}]</h3>

                <h3 class="right"><a class="clickable" data-toggle="modal" data-target="#myModal"><i
                            class="fa fa-plus-circle red-text"></i></a></h3>
                <br><br><br>
                <table class="responsive-table bordered striped">
                    <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Type
                        </th>
                        <th>
                            Quantity
                        </th>
                       
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr dir-paginate="inventory in inventories | itemsPerPage:15" ng-dblclick="open(inventory)">
                        <td>
                            {{inventory.name}}
                        </td>
                        <td>
                            {{inventory.type}}
                        </td>
                        <td>
                            {{inventory.quantity}}
                        </td>

                        <td class="right">
                            <button class="btn blue white-text" ng-click="info(inventory)"><i
                                    class="fa fa-info-circle"></i>
                            </button>
                            <button class="btn green white-text" ng-click="edit(inventory)"><i class="fa fa-pencil"></i>
                            </button>
                            <button class="btn red darken-4 white-text" ng-click="delete(inventory)"><i
                                    class="fa fa-trash"></i></button>
                        </td>

                    </tr>
                    </tbody>

                </table>
                <center>
                    <dir-pagination-controls
                        max-size="15"
                        direction-links="true"
                        boundary-links="true">
                    </dir-pagination-controls>
                </center>


            </div>
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ADD INVENTORY</h4>
                    </div>
                    <div class="modal-body">
                        <form id="addInventoryForm" ng-submit="add()">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="name" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type:</label>
                                <input type="text" class="form-control" id="model" ng-model="type"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" class="form-control" id="description" ng-model="description"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" class="form-control " id="quantity"
                                       ng-model="quantity"
                                       required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary red white-text">Save
                            changes <i ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Edit Inventory Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">EDIT INVENTORY</h4>
                    </div>
                    <div class="modal-body">
                        <form id="editInventoryForm" ng-submit="updateInventory()">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" id="name" ng-model="inventoryE.name"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="name">Type:</label>
                                <input type="text" class="form-control" id="name" ng-model="inventoryE.type"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Description:</label>
                                <input type="text" class="form-control" id="inventoryE.description"
                                       ng-model="inventoryE.description"
                                       required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Quantity:</label>
                                <input type="text" class="form-control" id="inventoryE.quantity"
                                       ng-model="inventoryE.quantity"
                                       required>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                data-dismiss="modal">Close
                        </button>
                        <button type="submit" class="btn btn-primary red white-text">Save changes <i
                                ng-show="loader" class="fa fa-spin fa-spinner"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--Inventory Info Modal-->
        <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" ng-click="closeEdit()" class="close" data-dismiss="modal"
                                aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><img src="img/medical/svg/tablets.svg" alt="inventory"
                                                                       width="7%">
                            INVENTORY INFORMATION</h4>
                    </div>
                    <div class="modal-body">
                        <h2>
                            NAME: <span class="blue-text">{{inventoryE.name | uppercase }}</span><br>
                            TYPE: <span class="blue-text">{{inventoryE.type| uppercase}}</span><br>
                            DESCRIPTION: <span class="blue-text">{{inventoryE.description }}</span><br>
                            QUANTITY: <span class="blue-text">{{inventoryE.quantity}}</span><br>
                        </h2>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" ng-click="closeEdit()"
                                data-dismiss="modal">Close
                        </button>
                        <button type="button" class="btn btn-default purple white-text" ng-click="closeEdit()"
                        >View Track Record
                        </button>
                        <button type="button" class="btn btn-default cyan white-text" ng-click="closeEdit()"
                        >Set Appointment
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
