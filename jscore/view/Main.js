/**
 * Главный экран
 */
Ext.define('Swan.view.Main', {
	extend: 'Ext.container.Viewport',
	layout: 'fit',
	items: [{
		title: 'Swan Test App',
		xtype: 'tabpanel',
		activeTab: 0,
		items: [{
			title: 'Книги',
			layout: 'fit',
			items: [
				Ext.create('Swan.view.Books')
			]
		}, {
			title: 'О тестовом задании',
			bodyPadding: 20,
			scrollable: true,
			items: [{
				xtype: 'label',
				html: "В проекте в качестве frontend используется фреймворк ExtJS 6.2.0 GPL (версия classic, документация тут: <a target='_blank' href='https://docs.sencha.com/extjs/6.2.0/classic/Ext.html'>https://docs.sencha.com/extjs/6.2.0/classic/Ext.html</a>), в качестве backend - CodeIgniter 3.1.9 (документация тут: <a target='_blank' href='https://www.codeigniter.com/user_guide/'>https://www.codeigniter.com/user_guide/</a>)<br><br>" +
					"Необходимо доработать данный проект:" +
					"<ul>" +
					"<li>Сделать хранение книг в БД</li>" +
					"<li>Реализовать форму добавления/редактирования книг</li>" +
					"<li>Реализовать функцию удаления книг</li>" +
					"<li>Реализовать функцию выгрузки всех книг в XML*</li>" +
					"</ul>"
			}, {
				xtype: 'fieldset',
				title: '* Формат XML',
				items: [{
					anchor: '100%',
					height: 200,
					xtype: 'textarea',
					readOnly: true,
					value: '<books>\n\t' +
						'<book>\n\t\t' +
						'<id>1</id>\n\t\t' +
						'<name>Война и мир</name>\n\t\t' +
						'<author>Толстой Л.Н.</author>\n\t' +
						'</book>\n' +
						'</books>'
				}]
			}]
		}]
	}]
});