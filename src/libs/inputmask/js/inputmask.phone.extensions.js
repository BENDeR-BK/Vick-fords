/*
 Input Mask plugin extensions
 http://github.com/RobinHerbots/jquery.inputmask
 Copyright (c) 2010 -  Robin Herbots
 Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 Version: 0.0.0-dev

 Phone extension.

 */
(function (factory) {
    if (typeof define === "function" && define.amd) {
        define(["./dependencyLibs/inputmask.dependencyLib", "./inputmask"], factory);
    } else if (typeof exports === "object") {
        module.exports = factory(require("./dependencyLibs/inputmask.dependencyLib"), require("./inputmask"));
    } else {
        factory(window.dependencyLib || jQuery, window.Inputmask);
    }
}
(function ($, Inputmask) {
    function maskSort(a, b) {
        var maska = (a.mask || a).replace(/#/g, "0").replace(/\)/, "0").replace(/[+()#-]/g, ""),
            maskb = (b.mask || b).replace(/#/g, "0").replace(/\)/, "0").replace(/[+()#-]/g, "");

        return maska.localeCompare(maskb);
    }

    var analyseMaskBase = Inputmask.prototype.analyseMask;

    Inputmask.prototype.analyseMask = function (mask, regexMask, opts) {
        var maskGroups = {};

        function reduceVariations(masks, previousVariation, previousmaskGroup) {
            previousVariation = previousVariation || "";
            previousmaskGroup = previousmaskGroup || maskGroups;
            if (previousVariation !== "") {
                previousmaskGroup[previousVariation] = {};
            }
            var variation = "", maskGroup = previousmaskGroup[previousVariation] || previousmaskGroup;
            for (var i = masks.length - 1; i >= 0; i--) {
                mask = masks[i].mask || masks[i];
                variation = mask.substr(0, 1);
                maskGroup[variation] = maskGroup[variation] || [];
                maskGroup[variation].unshift(mask.substr(1));
                masks.splice(i, 1);
            }
            for (var ndx in maskGroup) {
                if (maskGroup[ndx].length > 500) {
                    reduceVariations(maskGroup[ndx].slice(), ndx, maskGroup);
                }
            }
        }

        function rebuild(maskGroup) {
            var mask = "", submasks = [];
            for (var ndx in maskGroup) {
                if ($.isArray(maskGroup[ndx])) {
                    if (maskGroup[ndx].length === 1) {
                        submasks.push(ndx + maskGroup[ndx]);
                    }
                    else {
                        submasks.push(ndx + opts.groupmarker[0] + maskGroup[ndx].join(opts.groupmarker[1] + opts.alternatormarker + opts.groupmarker[0]) + opts.groupmarker[1]);
                    }
                } else {
                    submasks.push(ndx + rebuild(maskGroup[ndx]));
                }
            }
            if (submasks.length === 1) {
                mask += submasks[0];
            } else {
                mask += opts.groupmarker[0] + submasks.join(opts.groupmarker[1] + opts.alternatormarker + opts.groupmarker[0]) + opts.groupmarker[1];
            }

            return mask;
        }

        if (opts.phoneCodes) {
            if (opts.phoneCodes && opts.phoneCodes.length > 1000) {
                mask = mask.substr(1, mask.length - 2);
                reduceVariations(mask.split(opts.groupmarker[1] + opts.alternatormarker + opts.groupmarker[0]));
                mask = rebuild(maskGroups);
            }
            //escape 9 definition
            mask = mask.replace(/9/g, "\\9");
        }
        // console.log(mask);
        var mt = analyseMaskBase.call(this, mask, regexMask, opts);
        return mt;
    };
    Inputmask.extendAliases({
        "abstractphone": {
            groupmarker: ["<", ">"],
            countrycode: "",
            phoneCodes: [],
            keepStatic: "auto",
            mask: function (opts) {
                opts.definitions = {"#": Inputmask.prototype.definitions["9"]};
                var sorted = opts.phoneCodes.sort(maskSort);
                // console.table(sorted);
                return sorted;
            },
            onBeforeMask: function (value, opts) {
                var processedValue = value.replace(/^0{1,2}/, "").replace(/[\s]/g, "");
                if (processedValue.indexOf(opts.countrycode) > 1 || processedValue.indexOf(opts.countrycode) === -1) {
                    processedValue = "+" + opts.countrycode + processedValue;
                }

                return processedValue;
            },
            onUnMask: function (maskedValue, unmaskedValue, opts) {
                var unmasked = maskedValue.replace(/[()#-]/g, "");
                return unmasked;
            },
            inputmode: "tel",
        }
    });
    return Inputmask;
}));
