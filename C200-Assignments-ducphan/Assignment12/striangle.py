import pygame, sys
import math
from pygame.locals import*
import random as rn
pygame.init()

BLUE = (0,0,255)
WHITE = (255,255,255)

DISPLAYSURF = pygame.display.set_mode((500, 400), 0, 32)

pygame.display.set_caption("S-Triangle")

def triangle(loc,width):
    x = loc[0]
    y = loc[1]
    high = (width*math.sqrt(3))/2
    top = [x+(width/2), y]
    L = [x,y+high]
    R = [x+width, y+high]
    return top, L, R

DISPLAYSURF.fill(WHITE)

def draw_triangle(loc, w):
    pygame.draw.polygon(DISPLAYSURF, BLUE , (triangle(loc,w)),1)

def s(loc,width):
    if width > 1:
        s(triangle(loc,width)[0], width/2)
        s(triangle(loc,width)[1], width/2)
        s(triangle(loc,width)[2], width/2)
    else:
        return None
s((0,0),440)

while True:
    for event in pygame.event.get():
        if event.type == QUIT:
            pygame.quit()
            sys.exit()
    pygame.display.update()