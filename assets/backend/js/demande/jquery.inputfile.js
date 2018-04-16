/*jslint browser:true */
/*global jQuery */

(function($) {

    "use strict";

    /**
     * Main plugin class
     * @constructor
     * @param {jQuery} $element
     * @param {Object} config
     */
    var InputFile = function(element, config) {

        /**
         * Main element for the plugin
         * @type {jQuery}
         * @private
         */
        this._element = element;

        /**
         * Previous file url
         * @type {string}
         * @private
         */
        this._url = element.data('value');

        /**
         * Previous file text
         * @type {string}
         * @private
         */
        this._text = element.data('text');

        /**
         * Settings for the plugin
         * @type {Object}
         * @private
         */
        this._config = $.extend({}, InputFile.CONFIG, config);

        // Initialize the dom, add event listeners, etc
        this._init(element);
    };

    /**
     * Initialization method
     * @private
     */
    InputFile.prototype._init = function(element) {

        var $button,
            $base,
            $previous,
            $link,
            $remove,
            removeName,
            $checkbox,
            $fileButton;

        // Set the html
        element.wrap('<div class="' + InputFile.BASE_CLASS + '"><div class="' + InputFile.BUTTON_CLASS + '"></div></div>');

        $button = element.parent();
        $base = $button.parent();

        $previous = $('<div class="' + InputFile.PREVIOUS_CLASS + '"></div>').prependTo($base);
        $link = $('<a href="#" class="' + InputFile.LINK_CLASS + '" target="_blank"></a>').appendTo($previous);

        if (!this._config.dontRemove) {
            $remove = $('<button class="' + InputFile.REMOVE_CLASS + ' ' + this._config.removeButtonClass + '"></button>').appendTo($previous);

            $remove.append($(this._config.removeText).addClass('remove-icon'));
            $remove.append($(this._config.restoreText).addClass('restore-icon'));

            removeName = this._config.removeName || element.attr('name');
            $checkbox = $('<input type="checkbox" name="' + removeName + '" value="' + this._config.removeValue + '" disabled/>');

            $checkbox.hide().appendTo($remove);
        }

        if (!this._url) {
            $previous.hide();
        } else {
            $link.attr('href', this._url);
            $link.html(this._text || this._url);
        }

        $fileButton = $('<button class="' + this._config.uploadButtonClass + '">' + this._config.uploadText + '</button>').insertBefore(element);

        // Event listeners
        element.on('change', $.proxy(this.selectFile, this));

        if ($remove) {
            $remove.on('click', $.proxy(this.removeSelected, this));
        }

        element.triggerHandler('inputfile.init');
    };

    /**
     * Get the file from the input and update the link text
     * @param  {jQuery.Event} evt
     */
    InputFile.prototype.selectFile = function(evt) {

        var $input = $(evt.currentTarget),
            $base = $input.parents('.' + InputFile.BASE_CLASS),
            $div = $base.find('.' + InputFile.PREVIOUS_CLASS),
            $link = $div.find('a'),
            path = $input.val(),
            pathname = path.split(/[\\\/]/ig),
            fileName = pathname[pathname.length - 1],
            name = this._config.fileNameOnly ? fileName : path;

        // In IE you get a change and a remove event if we dont do this
        if (!$input.val()) {
            return;
        }

        $div.show();

        $base.find('input[type="checkbox"]').attr('disabled', 'disabled');
        $div.removeClass(InputFile.DELETED_CLASS);

        $link.attr('href', '#');
        $link.html(name);
        $link.on('click', function() { return false; });

        this._element.triggerHandler('inputfile.change', name);
    };

    /**
     * Input reset. This is done this way since for old IE the value is read only
     * and cloning removes the listeners and in some cases cloning olds the reference
     * to the file even
     * @private
     */
    InputFile.prototype._resetFile = function(input) {

        input.val('');

        // If after that we still have a value (like IE) then we need to replace the input
        // with a clone with the same listeners (true, true)
        if (input.val()) {
            var clone = input.clone(true, true);
            input.replaceWith(clone);
            this._element = clone;
        }
    };

    /**
     * Remove the file from the input
     * @param  {jQuery.Event} evt
     * @return {boolean}
     */
    InputFile.prototype.removeSelected = function(evt) {

        var $button = $(evt.currentTarget),
            $base = $button.parents('.' + InputFile.BASE_CLASS),
            $file = $base.find('input[type="file"]'),
            $parent = $button.parent(),
            $link = $parent.find('a'),
            $checkbox = $base.find('input[type="checkbox"]');

        if ($file.attr('data-value')) {

            if ($parent.hasClass(InputFile.DELETED_CLASS)) {

                $checkbox.removeAttr('checked')
                    .attr('disabled', 'disabled');

                $parent.removeClass(InputFile.DELETED_CLASS);

            } else {

                if ($link.attr('href') !== $file.attr('data-value')) {

                    $link.attr('href', $file.attr('data-value'))
                        .html($file.attr('data-text'));

                } else {

                    $checkbox.attr('checked', 'checked')
                        .removeAttr('disabled');

                    $parent.addClass(InputFile.DELETED_CLASS);
                }
            }

        } else {
            $parent.hide().addClass(InputFile.DELETED_CLASS);

            $checkbox.removeAttr('disabled', 'disabled');
            $link.html('');
            this._resetFile($file);
        }

        this._element.triggerHandler('inputfile.remove');

        return false;
    };

    /**
     * PLugin name
     * @type {string}
     * @const
     */
    InputFile.NAME = 'inputfile';

    /**
     * Css class for the base element
     * @type {string}
     * @const
     */
    InputFile.BASE_CLASS = 'inputfile';

    /**
     * Css class for the upload button
     * @type {string}
     * @const
     */
    InputFile.BUTTON_CLASS = 'upload-button';

    /**
     * Css class for the previous file button
     * @type {string}
     * @const
     */
    InputFile.PREVIOUS_CLASS = 'previous-file';

    /**
     * Css class for the deleted file name
     * @type {string}
     * @const
     */
    InputFile.DELETED_CLASS = 'deleted';

    /**
     * Css class for the upload button link
     * @type {string}
     * @const
     */
    InputFile.LINK_CLASS = 'upload-button-link';

    /**
     * Css class for remove button
     * @type {string}
     * @const
     */
    InputFile.REMOVE_CLASS = 'upload-button-remove';

    /**
     * Default configuration settings
     * @type {Object}
     */
    InputFile.CONFIG = {
        uploadText: '<i class="icon-upload"></i> Upload file',
        removeText: '<i class="icon-trash"></i>',
        restoreText: '<i class="icon-undo"></i>',

        uploadButtonClass: 'btn',
        removeButtonClass: 'btn',

        removeName: '',
        removeValue: 1,

        dontRemove: false,

        fileNameOnly: true
    };

    /**
     * Main plugin handler
     * @param  {string} method
     * @return {*}
     */
    $.fn.inputfile = function(method) {

        if (method && method !== 'constructor' && InputFile[method]) {
            return methods[method].apply($(this), Array.prototype.slice.call(arguments, 1));
        } else if (!method || (method && method.constructor === Object)) {
            return this.each(function() {
                if (!$(this).data('plugin-' + InputFile.NAME)) {
                    $(this).data('plugin-' + InputFile.NAME, new InputFile($(this), method));
                }
            });
        }
    };



}(jQuery));
