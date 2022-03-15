wp.blocks.registerBlockType('alumplugin/alumni-redirects-block', {
    title: 'Alumni Redirects Block!',
    icon: 'smiley',
    category: 'common',
    edit: () => {
        return wp.element.createElement('H1', null, 'Block Inserted, Redirect Activated!');
    },
    save: () => {
        return null;
    }
});