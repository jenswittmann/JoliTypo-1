<?php

namespace JoliTypo\Fixer;

use JoliTypo\Fixer;
use JoliTypo\FixerInterface;

/**
 * NO_BREAK_SPACE before :
 * NO_BREAK_THIN_SPACE before ; : ! ?
 * As recommended by "Abrégé du code typographique à l'usage de la presse", ISBN: 978-2351130667
 *
 * @package JoliTypo\Fixer
 */
class FrenchNoBreakSpace implements FixerInterface
{
    public function fix($content)
    {
        $content = preg_replace('@[\s'.Fixer::NO_BREAK_SPACE.Fixer::NO_BREAK_THIN_SPACE.']+(:)@m', Fixer::NO_BREAK_SPACE.'$1', $content);
        $content = preg_replace('@[\s'.Fixer::NO_BREAK_SPACE.Fixer::NO_BREAK_THIN_SPACE.']+([;!\?])@m', Fixer::NO_BREAK_THIN_SPACE.'$1', $content);

        return $content;
    }
}
