function addacupoint(name) {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "穴道.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Acupoint (id integer primary key, acupoint text)');
            tx.executeSql("INSERT INTO Acupoint (acupoint) VALUES (?)", [name]);
            $('#addacupoint').html('移出最愛');
            $('#addacupoint').attr("onclick", "delacupoint('" + name + "');");
        }
    );
}
function addsympton(name) {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "症狀.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Sympton (id integer primary key, sympton text)');
            tx.executeSql("INSERT INTO Sympton (sympton) VALUES (?)", [name]);
            $('#addsympton').html('移出最愛');
            $('#addsympton').attr("onclick", "delsympton('" + name + "');");
        }
    );
}
function delacupoint(name) {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "穴道.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Acupoint (id integer primary key, acupoint text)');
            tx.executeSql('DELETE FROM Acupoint WHERE acupoint="' + name + '"');
            $('#addacupoint').html('加入最愛');
            $('#addacupoint').attr("onclick", "addacupoint('" + name + "');");
        }
    );
}
function delsympton(name) {
    var db1 = window.sqlitePlugin.openDatabase({
        name: "症狀.db",
        location: 'default',
        androidDatabaseProvider: 'system'
    });
    db1.transaction(
        function (tx) {
            tx.executeSql('CREATE TABLE IF NOT EXISTS Sympton (id integer primary key, sympton text)');
            tx.executeSql('DELETE FROM Sympton WHERE sympton="' + name + '"');
            $('#addsympton').html('加入最愛');
            $('#addsympton').attr("onclick", "addsympton('" + name + "');");
        }
    );
}