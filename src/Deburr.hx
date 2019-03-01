class Deburr{

/** Used to match Latin Unicode letters (excluding mathematical operators). */
static final reLatin = ~/[\xc0-\xd6\xd8-\xf6\xf8-\xff\u0100-\u017f]/g;

/** Used to compose unicode character classes. */
static final rsComboMarksRange = '\\u0300-\\u036f';
static final reComboHalfMarksRange = '\\ufe20-\\ufe2f';
static final rsComboSymbolsRange = '\\u20d0-\\u20ff';
static final rsComboMarksExtendedRange = '\\u1ab0-\\u1aff';
static final rsComboMarksSupplementRange = '\\u1dc0-\\u1dff';
static final rsComboRange = rsComboMarksRange + reComboHalfMarksRange + rsComboSymbolsRange + rsComboMarksExtendedRange + rsComboMarksSupplementRange;

/** Used to compose unicode capture groups. */
static final rsCombo = '[${rsComboRange}]';

/**
 * Used to match [combining diacritical marks](https://en.wikipedia.org/wiki/Combining_Diacritical_Marks) and
 * [combining diacritical marks for symbols](https://en.wikipedia.org/wiki/Combining_Diacritical_Marks_for_Symbols).
 */
static final reComboMark = new EReg(rsCombo, 'g');

/**
 * Deburrs `string` by converting
 * [Latin-1 Supplement](https://en.wikipedia.org/wiki/Latin-1_Supplement_(Unicode_block)#Character_table)
 * and [Latin Extended-A](https://en.wikipedia.org/wiki/Latin_Extended-A)
 * letters to basic Latin letters and removing
 * [combining diacritical marks](https://en.wikipedia.org/wiki/Combining_Diacritical_Marks).
 *
 * @since 3.0.0
 * @category String
 * @param {string} [string=''] The string to deburr.
 * @returns {string} Returns the deburred string.
 * @example
 *
 * deburr('déjà vu')
 * // => 'deja vu'
 */
public static function deburr(str) {
  return reComboMark.replace(str, '');
}

}
