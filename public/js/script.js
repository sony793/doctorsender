var app = angular.module('Paginador', []);

app.controller('miTabla', ['$scope', function($scope) {
    console.log("entro a mi controller");
}]);

// En esta parte colocaré el objeto JSON con un registro para que no se extienda mucho, si quieren ver todos los registros deberán hecharle un vistazo al código en JSBIN.
$scope.data = $scope.usuarios = [{
    id: 1,
    primernombre: 'Juan',
    segundonombre: 'Mario',
    primerapellido: 'Pérez',
    segundoapellido: 'Maldonado',
    fechanacimiento: '23-12-1985'
}, {
    ... // Aqui van los demás registros
}];

$scope.currentPage = 0;
$scope.pageSize = 10; // Esta la cantidad de registros que deseamos mostrar por página
$scope.pages = [];

$scope.configPages = function() {
    $scope.pages.length = 0;
    var ini = $scope.currentPage - 4;
    var fin = $scope.currentPage + 5;
    if (ini < 1) {
        ini = 1;
        if (Math.ceil($scope.data.length / $scope.pageSize) > 10) fin = 10;
        else fin = Math.ceil($scope.data.length / $scope.pageSize);
    } else {
        if (ini >= Math.ceil($scope.data.length / $scope.pageSize) - 10) {
            ini = Math.ceil($scope.data.length / $scope.pageSize) - 10;
            fin = Math.ceil($scope.data.length / $scope.pageSize);
        }
    }
    if (ini < 1) ini = 1;
    for (var i = ini; i <= fin; i++) {
        $scope.pages.push({ no: i });
    }
    if ($scope.currentPage >= $scope.pages.length)
        $scope.currentPage = $scope.pages.length - 1;
};
$scope.setPage = function(index) {
    $scope.currentPage = index - 1;
};

$scope.configPages();