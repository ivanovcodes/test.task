/**
 * Список книг
 */
Ext.define('Swan.view.Books', {
	extend: 'Ext.grid.Panel',
	store: {
		proxy: {
			type: 'ajax',
			url: 'index.php/Book/loadList',
			reader: {
				type: 'json',
				idProperty: 'book_id'
			}
		},
		autoLoad: true,
		remoteSort: false,
		sorters: [{
			property: 'book_name',
			direction: 'ASC'
		}]
	},
	defaultListenerScope: true,
	tbar: [{
		text: 'Добавить',
		handler: function() {
			// todo надо реализовать добавление
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}, {
		text: 'Редактировать',
		handler: function() {
			// todo надо реализовать редактирование
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}, {
		text: 'Удалить',
		handler: function() {
			// todo надо реализовать удаление
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}, {
		text: 'Экспорт в XML',
		handler: function() {
			// todo надо реализовать удаление
			Ext.Msg.alert('В разработке', 'Данный функционал ещё не реализован');
		}
	}],
	columns: [{
		dataIndex: 'author_name',
		text: 'Автор',
		width: 150
	}, {
		dataIndex: 'book_name',
		text: 'Название книги',
		flex: 1
	}, {
		dataIndex: 'book_year',
		text: 'Год издания',
		width: 150
	}]
});